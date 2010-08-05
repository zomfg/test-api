<?php
/**
 * Description of Abstract
 *
 * @author Sergio
 */
abstract class Aum_Client_Abstract {
    /**
     * @var Zend_Config
     */
    protected $config = null;

    /**
     * @param Zend_Config $config
     */
    protected function init(Zend_Config $config) {
        $this->config = $config;
    }

    /**
     * @param Aum_Model_User $user
     */
    abstract public function login(Aum_Model_User &$user);
    abstract public function logout();
    abstract public function acceptCharm($aumId);
    abstract public function refuseCharm($aumId);
    abstract public function alertBoulayz($aumId);
    abstract public function sendMessage($destinationAumId, $message);
    abstract public function kickFromBasket($aumId);
    abstract public function addToBasket($aumId);
    abstract public function addToFavorites($aumId);
}
?>
