<?php
/**
 * Description of ProfileController
 *
 * @author Sergio
 */
class ProfilesController extends Aum_Controller_Base {
    public function init() {
        return parent::init();
    }

    public function indexAction() {
        $this->_forward('get');
    }

    public function getAction() {
        $this->httpError(501);
    }
}
?>
