<?php

class MessagesController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'test', 'thread', 'list', 'send', 'delete'));
    }

    public function indexAction() {
        $this->_forward('list');
    }

    public function testAction() {
        $this->test();
    }

    public function sendAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        $message = $this->getRequest()->getParam($this->config->api->paramKey->thread->message);
        if (!$aumId || !is_numeric($aumId) || !$message)
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->sendMessage($aumId, $message))
            $this->httpError(500);
    }

    public function deleteAction() {
        $threads = $this->getRequest()->getParam($this->config->api->paramKey->thread->delete);
        if (!$threads || !is_array($threads) || count($threads) < 1)
            return $this->httpError(400);
        if (!$this->aumClient->deleteThreads($threads))
            $this->httpError(500);
    }

    public function listAction() {
        $this->getPage(new Aum_Factory_Mail());
    }

    public function threadAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        $this->getPage(new Aum_Factory_Thread($aumId));
    }
}
