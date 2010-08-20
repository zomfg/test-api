<?php
/**
 * Description of CharmsController
 *
 * @author Sergio
 */
class CharmsController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'accept', 'refuse', 'launch', 'list', 'list-new'));
    }

    public function indexAction() {
        $this->listNewAction();
    }

    public function acceptAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumClient->acceptCharm($aumId))
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
    }

    public function refuseAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumClient->refuseCharm($aumId))
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
    }

    public function launchAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_BAD_REQUEST);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(Aum_Response::STATUS_CODE_NOT_ALLOWED);
        if (!$this->aumClient->addToFavorites($aumId))
            $this->httpError(Aum_Response::STATUS_CODE_ERROR_AUM);
    }

    public function listAction() {
        $this->setApiResponse($this->getPage(new Aum_Factory_List('charm')));
    }

    public function listNewAction() {
        $this->setApiResponse($this->getPage(new Aum_Factory_NewCharm()));
    }
}
?>
