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
        $this->listAction();
    }

    public function listAction() {
        $this->setApiResponse($this->getPage(new Aum_Factory_List('visit')));
    }
}
?>
