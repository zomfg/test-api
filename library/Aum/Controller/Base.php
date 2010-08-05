<?php
/**
 * Description of Base
 *
 * @author Sergio
 */
class Aum_Controller_Base extends Zend_Controller_Action {
    /**
     * @var Aum_Client_Abstract
     */
    protected $aumClient = null;

    /**
     * @var Zend_Config
     */
    protected $config = null;

    /**
     * @var bool
     */
    private $authenticated = false;

    /**
     * @var integer
     */
    protected $httpErrorCode = 500;

    /**
     * @var Aum_Model_User
     */
    protected $aumUser = null;

    public function init() {
        $this->config = Aum_Config::get();
        $this->authenticate();
        $this->aumClient = new Aum_Client_Http($this->config);
        if ($this->isAuthenticated()) {
            try {
                if (!$this->aumClient->login($this->aumUser))
                    $this->httpError(403);
            }
            catch (Exception $e) {$this->httpError(500);}
        }
        else
            $this->httpError(401);
        return parent::init();
    }

    protected function initContexts(array $actions = array()) {
        if (count($actions) < 1)
            return ;
        $contexts = explode(',', $this->config->api->formats);
        if (!is_array($contexts) || count($contexts) < 1)
            return ;
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        //$contextSwitch->addContext('plist', array('suffix' => 'plist', 'headers' => array('Content-Type' => 'application/xml')));
        $actionContexts = array();
        foreach ($actions as $action)
            $actionContexts[$action] = $contexts;
        $contextSwitch->addActionContexts($actionContexts);
        //$contextSwitch->setAutoJsonSerialization(false);
        $contextSwitch->initContext();
    }

    protected function test() {
        $this->view->sap = array(__FUNCTION__, $this->getRequest()->getParams());
    }

    protected function authenticate() {
        if (!($receivedSignature = $this->getRequest()->getParam($this->config->api->paramKey->auth)))
            return false;
        if (!($login = $this->getRequest()->getParam($this->config->api->paramKey->login)))
            return false;
        if (!($password = $this->getRequest()->getParam($this->config->api->paramKey->password)))
            return false;
        $skipParams = array(
            $this->getRequest()->getActionKey(),
            $this->getRequest()->getControllerKey(),
            $this->getRequest()->getModuleKey(),
            $this->config->api->security->authKey
        );
        $params = $this->getRequest()->getParams();
        ksort($params);
        $data = null;
        foreach ($params as $k => $v)
            if (!in_array($k, $skipParams))
                $data .= '&'.$k.'='.$v;
        $computedSignature = Zend_Crypt_Hmac::compute(
                $this->config->api->security->privateKey,
                $this->config->api->security->algorithm, $data);
        Zend_Debug::dump($data);
        Zend_Debug::dump($receivedSignature);
        Zend_Debug::dump($computedSignature);
        if ($computedSignature == $receivedSignature) {
            $this->aumUser = new Aum_Model_User($login, $password);
            $this->authenticated = true;
        }
        return $this->authenticated;
    }

    protected function isAuthenticated() {
        return $this->authenticated;
    }

    protected function httpError($errorCode = 500) {
        $this->httpErrorCode = $errorCode;
        $this->_forward('error');
    }

    public function errorAction() {
        $this->_helper->viewRenderer->setNoRender();
        $this->getResponse()->setHttpResponseCode($this->httpErrorCode);
    }
}
?>
