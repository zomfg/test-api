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

    protected function init(Zend_Config $config) {
        $this->config = $config;
    }

    abstract public function login();
}
?>
