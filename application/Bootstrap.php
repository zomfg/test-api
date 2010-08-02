<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRestRoutes() {
        $frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();
        $restRoute = new Zend_Rest_Route($frontController);
        $router->addRoute('default', $restRoute);
    }
}
