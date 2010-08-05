<?php
/**
 * Description of Static
 *
 * @author Sergio
 */
class Aum_Client_Static extends Aum_Client_Abstract {
    /**
     * @param Zend_Config $config
     */
    public function __construct(Zend_Config $config) {
        $this->init($config);
    }

    /**
     * @param Zend_Config $config
     */
    protected function init(Zend_Config $config) {
        parent::init($config);
    }

    public function getPage($url) {
        return file_get_contents(APPLICATION_PATH.'/../tests/static/'.$url);
    }

    public function acceptCharm($aumId) {
        return true;
    }

    public function addToBasket($aumId) {
        return true;
    }

    public function addToFavorites($aumId) {
        return true;
    }

    public function alertBoulayz($aumId) {
        return true;
    }

    public function kickFromBasket($aumId) {
        return true;
    }

    public function login(Aum_Model_User &$user) {
        return true;
    }

    public function logout() {
        return true;
    }

    public function refuseCharm($aumId) {
        return true;
    }

    public function sendMessage($destinationAumId, $message) {
        return true;
    }

    public function blockMember($aumId) {
        return true;
    }

    public function deleteThreads(array $threads) {
        return true;
    }

    public function getOutFromBasket($aumId) {
        return true;
    }
}
?>
