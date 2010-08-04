<?php

class MessagesController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'test'));
    }

    public function indexAction() {
        $factory = new Aum_Factory_Home();
        $page = $factory->createPage();
        $page->setHtmlBody($this->aumClient->getPage($page->getURL()));
        $page->parse($factory->createParser());
        $this->view->response = $page->toArray();
    }

    public function testAction() {
        $this->test();
    }

    public function sendAction() {
        $aumId = $this->getRequest()->getParam('destination');
        if (!$aumId || !is_numeric($aumId))
            ;
        $message = $this->getRequest()->getParam('message');
        $this->aumClient->sendMessage($aumId, $message);
    }

    public function listAction() {
        $factory = new Aum_Factory_Mail();
        $page = $factory->createPage();
        $page->setHtmlBody($this->aumClient->getPage($page->getURL()));
        $page->parse($factory->createParser());
        $this->view->response = $page->toArray();
    }

    public function threadAction() {
        $aumId = $this->getRequest()->getParam('destination');
        if (!$aumId || !is_numeric($aumId))
            ;
        $factory = new Aum_Factory_Thread();
        $page = $factory->createPage();
        $url = sprintf($page->getURL(), $aumId);
        $page->setHtmlBody($this->aumClient->getPage($url));
        $page->parse($factory->createParser());
        $this->view->response = $page->toArray();
    }
}
