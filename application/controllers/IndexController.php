<?php
class IndexController extends Aum_Controller_Base {

    public function init() {
        parent::init();
        $this->initContexts(array('index'));
    }

    public function indexAction() {
        $this->getPage(new Aum_Factory_Home());
    }
}
?>