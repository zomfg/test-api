<?php
/**
 * Description of Http
 *
 * @author Sergio
 */
class Aum_Client_Http extends Aum_Client_Abstract {
    /**
     * @var Zend_Http_Client
     */
    private $httpClient = null;

    public function __construct(Zend_Config $config) {
        $this->init($config);
    }

    private function init(Zend_Config $config) {
        parent::init($config);
        $this->httpClient = new Zend_Http_Client();
    }
}
?>
