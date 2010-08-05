<?php
/**
 * Description of VisitsController
 *
 * @author Sergio
 */
class VisitsController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'list'));
    }

    public function indexAction()
    {
        $this->_forward('list');
    }

    public function listAction() {
        $this->getPage(new Aum_Factory_List('visit'));
    }
}
?>
