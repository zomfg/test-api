<?php
/**
 * Description of ProfileController
 *
 * @author Sergio
 */
class ProfilesController extends Aum_Controller_Base {
    public function init() {
        parent::init();
        $this->initContexts(array('index', 'visit', 'block', 'report'));
    }

    public function indexAction() {
        $this->_forward('visit');
    }

    public function visitAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (Aum_Model_User::getSex($aumId) == Aum_Model_User::SEX_FEMALE)
            $response = $this->getPage(new Aum_Factory_Profile_Girl($aumId));
        else
            $response = $this->getPage(new Aum_Factory_Profile_Boy($aumId));
        var_dump($response->toArray());
        $this->setApiResponse($response);
    }

    public function blockAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->blockMember($aumId))
            $this->httpError();
    }

    public function reportAction() {
        $aumId = $this->getRequest()->getParam($this->config->api->paramKey->aumId);
        if (!$aumId || !is_numeric($aumId))
            return $this->httpError(400);
        if (!$this->aumUser->canInteractWith($aumId))
            return $this->httpError(405);
        if (!$this->aumClient->alertBoulayz($aumId))
            $this->httpError();
    }
}
?>
