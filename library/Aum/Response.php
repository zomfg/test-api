<?php
/**
 * Description of Response
 *
 * @author Sergio
 */
class Aum_Response extends Aum_Abstract {
    /**
     * @var Zend_Config
     */
    private $config = null;

    /**
     * @var string
     */
    private $message = null;

    /**
     * @var array
     */
    private $data = null;

    /**
     * @var array
     */
    private $extra = null;

    public function __construct(Zend_Config $config = null) {
        $this->config = $config;
        if (!$this->config)
            $this->config = Aum_Config::get();
    }

    public function getConfig() {
        return $this->config;
    }

    public function setConfig(Zend_Config $config) {
        $this->config = $config;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        if ($data instanceof Aum_Interface)
            $this->data = $data->toArray();
        else if (is_array($data))
            $this->data = $data;
    }

    public function getExtra() {
        return $this->extra;
    }

    public function setExtra($extra) {
        if ($extra instanceof Aum_Interface)
            $this->extra = $extra->toArray();
        else if (is_array($extra))
            $this->extra = $extra;
    }
    /**
     * @param array $response
     * @param Zend_Config $config
     * @return Aum_Response
     */
    public static function fromArray(array $response, Zend_Config $config = null) {
        $newResponse = new self($config);
        if (isset($response[$newResponse->getConfig()->api->response->data]))
            $newResponse->setData($response[$newResponse->getConfig()->api->response->data]);
        if (isset($response[$newResponse->getConfig()->api->response->message]))
            $newResponse->setMessage($response[$newResponse->getConfig()->api->response->message]);
        if (isset($response[$newResponse->getConfig()->api->response->extra]))
            $newResponse->setExtra($response[$newResponse->getConfig()->api->response->extra]);
        return $newResponse;
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this), array('config'));
    }
}
?>