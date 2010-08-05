<?php

class MessagesController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'test', 'thread', 'list', 'send'));
    }

    public function indexAction() {
        $factory = new Aum_Factory_Home();
        $page = $factory->createPage();
        try {
            $page->setHtmlBody($this->aumClient->getPage($page->getURL()));
            $page->parse($factory->createParser());
            $this->view->response = $page->toArray();
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $this->httpError(500);
        }
    }

    public function testAction() {
        $this->test();
    }

    public function sendAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        $message = $this->getRequest()->getParam($this->config->api->paramKey->thread->message);
        if (!$aumId || !is_numeric($aumId) || !$message)
            return $this->httpError(400);
        if (!$this->aumClient->sendMessage($aumId, $message))
            $this->httpError(500);
    }

    public function listAction() {
        $factory = new Aum_Factory_Mail();
        $page = $factory->createPage();
        try {
            $page->setHtmlBody($this->aumClient->getPage($page->getURL()));
            $page->parse($factory->createParser());
            $this->view->response = $page->toArray();
        }
        catch (Exception $e) {
            $this->httpError();
        }
    }

    public function threadAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        $factory = new Aum_Factory_Thread();
        $page = $factory->createPage();
        $url = sprintf($page->getURL(), $aumId);
        $page->setHtmlBody($this->aumClient->getPage($url));
        $page->parse($factory->createParser());
        $this->view->response = $page->toArray();
    }
}
