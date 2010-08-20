<?php
/**
 * Description of GtfoController
 *
 * @author Sergio
 */
class GtfoController extends Zend_Controller_Action {
    public function indexAction() {
        $this->getResponse()->setHttpResponseCode($this->getRequest()->getParam('httpcode', Aum_Response::STATUS_CODE_BAD_SIGNATURE));
        $this->_helper->viewRenderer->setNoRender();
    }
}
?>
