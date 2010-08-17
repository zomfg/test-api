<?php

class BasketsController extends Aum_Controller_Base
{
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'list', 'add', 'kick', 'get-out'));
    }

    public function indexAction()
    {
        $this->listAction();
    }

    public function listAction() {
        if (Aum_Model_User::getSex($this->aumUser->getId()) == Aum_Model_User::SEX_FEMALE)
            $this->setApiResponse($this->getPage(new Aum_Factory_Basket_Boy()));
        else
            $this->setApiResponse($this->getPage(new Aum_Factory_Basket_Girl()));
    }

    public function addAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->addToBasket($aumId))
            $this->httpError();
    }

    public function kickAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->kickFromBasket($aumId))
            $this->httpError();
    }

    public function getOutAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->getOutFromBasket($aumId))
            $this->httpError();
    }
}

