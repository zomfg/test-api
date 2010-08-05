<?php
/**
 * Description of VisitsController
 *
 * @author Sergio
 */
class VisitsController extends Aum_Controller_Base {
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
}
?>
