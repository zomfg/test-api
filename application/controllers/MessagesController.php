<?php

class MessagesController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'test', 'thread', 'list', 'send', 'delete'));
    }

    public function indexAction() {
        $this->listAction();
    }

    public function sendAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        $message = $this->getRequest()->getParam($this->config->api->paramKey->thread->message);
        if (!$aumId || !is_numeric($aumId) || !$message)
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_NOT_ALLOWED);
        if (!$this->aumClient->sendMessage($aumId, $message))
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
    }

    public function deleteAction() {
        $threads = $this->getRequest()->getParam($this->config->api->paramKey->thread->delete);
        if (!$threads || !is_array($threads) || count($threads) < 1)
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumClient->deleteThreads($threads))
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
    }

    public function listAction() {
        $this->setApiResponse($this->getPage(new Aum_Factory_Mail()));
    }

    public function threadAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->thread->destination);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_NOT_ALLOWED);
        $this->setApiResponse($this->getPage(new Aum_Factory_Thread($aumId)));
    }
}
