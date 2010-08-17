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
                    $this->httpError(403);
            }
            catch (Exception $e) {$this->httpError(500);}
        }
        else {
            $this->httpError(401);
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

    protected function httpError($errorCode = 500) {
        $this->httpErrorCode = $errorCode;
        $this->getResponse()->setHttpResponseCode($this->httpErrorCode);
        $this->errorAction();
    }

    public function errorAction() {
        $this->_helper->viewRenderer->setNoRender();
    }

    public function __call($method, $args)
    {
        if ('Action' == substr($method, -6))
            return $this->httpError(501);
        throw new Exception('Invalid method "'
                            . $method
                            . '" called',
                            500);
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
            $this->httpError(500);
        }
        return $response;
    }

    /**
     * @param Aum_Response $response
     */
    protected function setApiResponse(Aum_Response $response) {
        $this->view->response = $response->toArray();
    }

    public function postXmlContext() {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $view = $viewRenderer->view;
        if ($view instanceof Zend_View_Interface) {
            if(method_exists($view, 'getVars')) {
                $vars = Zend_Json::encode($view->getVars());
                $this->getResponse()->setBody($vars);
            } else {
                throw new Zend_Controller_Action_Exception('View does not implement the getVars() method needed to encode the view into JSON');
            }
        }
    }

    public function initXmlContext()
    {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $view = $viewRenderer->view;
        if ($view instanceof Zend_View_Interface) {
            $viewRenderer->setNoRender(true);
        }
    }
}
?>
