<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRoutes() {
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/routes.ini', APPLICATION_ENV);
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $router->addConfig($config, 'routes');
    }
}

