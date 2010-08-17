<?php
/**
 * Description of GtfoController
 *
 * @author Sergio
 */
class GtfoController extends Zend_Controller_Action {
    public function indexAction() {
        $this->getResponse()->setHttpResponseCode($this->getRequest()->getParam('httpcode', 401));
        $this->_helper->viewRenderer->setNoRender();
    }
}
?>
