<?php
/**
 * Description of CharmsController
 *
 * @author Sergio
 */
class CharmsController extends Aum_Controller_Base {
    public function init() {
        return parent::init();
    }

    public function indexAction() {
        $this->_forward('list');
    }

    public function acceptAction() {
        $this->httpError(501);
    }

    public function refuseAction() {
        $this->httpError(501);
    }

    public function launchAction() {
        $this->httpError(501);
    }

    public function listAction() {
        $this->httpError(501);
    }

    public function newAction() {
        $this->httpError(501);
    }
}
?>
