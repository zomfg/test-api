<?php

class BasketsController extends Aum_Controller_Base
{
    public function init()
    {
        return parent::init();
    }

    public function indexAction()
    {
        $this->_forward('list');
    }

    public function listAction() {
        $this->httpError(501);
    }

    public function addAction() {
        $this->httpError(501);
    }

    public function kickAction() {
        $this->httpError(501);
    }
}

