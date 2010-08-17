<?php
/**
 * Description of AumConfig
 *
 * @author dirk
 */
class Aum_Config {
    /**
     * @staticvar Zend_Config $config
     * @return Zend_Config
     */
    public static function get() {
        static $config = null;
        if ($config == null) {
            $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/api.ini', APPLICATION_ENV);
            $config->setReadOnly();
        }
        return $config;
    }

    public static function postXmlContext() {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $view = $viewRenderer->view;
        if ($view instanceof Zend_View_Interface) {
            if(method_exists($view, 'getVars')) {
                $vars = Zend_Json::encode($view->getVars());
                $response = new Zend_Controller_Response_Http();
                $response->setBody($vars);
            } else {
                throw new Zend_Controller_Action_Exception('View does not implement the getVars() method needed to encode the view into JSON');
            }
        }
    }

    public static function initXmlContext()
    {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $view = $viewRenderer->view;
        if ($view instanceof Zend_View_Interface) {
            $viewRenderer->setNoRender(true);
        }
    }
}
?>
