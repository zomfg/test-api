<?php
/**
 * Description of Base
 *
 * @author Sergio
 */
abstract class Aum_Controller_Base extends Zend_Controller_Action {
    /**
     * @var Aum_Client_Abstract
     */
    protected $aumClient = null;

    /**
     * @var Zend_Config
     */
    protected $config = null;

    /**
     * @var integer
     */
    protected $httpErrorCode = 500;

    /**
     * @var Aum_Model_User
     */
    protected $aumUser = null;

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->httpRequest = new Zend_Controller_Request_Http();
        $this->config = Aum_Config::get();
        $this->aumClient = new Aum_Client_Http($this->config);
        $this->authenticate();
    }

    public function authenticate() {
        if ($this->createAumUser()) {
            try {
                if (!$this->aumClient->login($this->aumUser))
                    $this->httpError(Aum_Response::STATUS_CODE_CANT_LOGIN);
            }
            catch (Exception $e) {$this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);}
        }
        else {
            $this->httpError(Aum_Response::STATUS_CODE_BAD_SIGNATURE);
        }
    }

    protected function initContexts(array $actions = array()) {
        if (count($actions) < 1)
            return ;
        $contexts = explode(',', $this->config->api->formats);
        if (!is_array($contexts) || count($contexts) < 1)
            return ;
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
//        //$contextSwitch->addContext('plist', array('suffix' => 'plist.phtml', 'headers' => array('Content-Type' => 'application/xml')));
        $actionContexts = array();
        foreach ($actions as $action)
            $actionContexts[$action] = $contexts;
        $contextSwitch->addActionContexts($actionContexts);
        $contextSwitch->initContext();
    }

    protected function test() {
        $this->view->sap = array(__FUNCTION__, $this->getRequest()->getParams());
    }

    private function createAumUser() {
        if (!($login = $this->getRequest()->getParam($this->config->api->paramKey->login)))
            return false;
        if (!($password = $this->getRequest()->getParam($this->config->api->paramKey->password)))
            return false;
        $this->aumUser = new Aum_Model_User($login, $password);
        return true;
    }

    protected function httpError($errorCode = Aum_Response::STATUS_CODE_ERROR_INTERNAL) {
        $this->httpErrorCode = $errorCode;
        $this->getResponse()->setHttpResponseCode($this->httpErrorCode);
        header("HTTP/1.0 ".$this->httpErrorCode." Fail", true, $this->httpErrorCode);
        die('');
    }

    public function __call($method, $args)
    {
        if ('Action' == substr($method, -6))
            return $this->httpError(Aum_Response::STATUS_CODE_NOT_IMPLEMENTED);
        throw new Exception('Invalid method "'
                            . $method
                            . '" called',
                            Aum_Response::STATUS_CODE_ERROR_INTERNAL);
    }

    /**
     * @param Aum_Factory_Abstract $factory
     * @return Aum_Response
     */
    protected function getPage(Aum_Factory_Abstract $factory) {
        $response = new Aum_Response($this->config);
        $page = $factory->createPage();
        try {
            $page->setHtmlBody($this->aumClient->getPage($page->getURL()));
            $page->parse($factory->createParser());
            $response->setData($page);
        }
        catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
        }
        return $response;
    }

    /**
     * @param Aum_Response $response
     */
    protected function setApiResponse(Aum_Response $response) {
        $remoteApiConfigVersion = $this->getRequest()->getParam($this->config->api->paramKey->remoteApiConfigVersion);
        if ($remoteApiConfigVersion != null) {
            $config = Aum_Config::getRemote();
            if ($config->version > $remoteApiConfigVersion)
                $response->setApiconfig($config->toArray());
        }
        $this->view->response = $response->toArray();
    }
}
?>
