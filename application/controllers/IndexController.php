<?php

class IndexController extends Zend_Rest_Controller
{
    public function init()
    {
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addContext('plist', array('suffix' => 'plist', 'headers' => array('Content-Type' => 'application/xml')));
        $contexts = array('json', 'xml', 'plist');
        $contextSwitch->addActionContexts(array(
            'index' => $contexts,
            'get' => $contexts,
            'delete' => $contexts,
            'put' => $contexts,
            'post' => $contexts))
                ;
        //$contextSwitch->setAutoJsonSerialization(false);
        $contextSwitch->initContext();
    }

    public function indexAction()
    {
//        echo __FUNCTION__;
    }

    public function deleteAction() {
//        echo __FUNCTION__;
    }

    public function getAction() {
        //echo __FUNCTION__;
        $this->view->shit = "lol";
    }

    public function postAction() {
//        echo __FUNCTION__;
    }

    public function putAction() {
//        echo __FUNCTION__;
    }
}

