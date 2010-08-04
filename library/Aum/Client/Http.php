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

    /**
     * @var Aum_Model_User
     */
    private $user = null;

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
        $this->httpClient = new Zend_Http_Client();
        $this->httpClient->setConfig(array('keepalive' => true));
        if (isset($_SESSION['cookiejar']) && $_SESSION['cookiejar'] instanceof Zend_Http_CookieJar)
            $this->httpClient->setCookieJar($_SESSION['cookiejar']);
        else
            $this->httpClient->setCookieJar();
    }

    /**
     * @param string $uri
     * @param string $method
     * @return Zend_Http_Response
     */
    protected function sendRequest($uri, $method) {
        $this->httpClient->setUri($this->config->aum->host.$uri);
        return $this->httpClient->request($method);
    }

    /**
     * @param string $pageUri
     * @return string $pageContent
     */
    public function getPage($pageUri) {
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($pageUri, Zend_Http_Client::GET);
        if (!$response->isSuccessful())
            return null;
        return $response->getBody();
    }

    /**
     * ACTIONS
     */
    private function getAumAnticahe() {
        return sprintf('0.%.0f', microtime(true) * mt_rand(0, mt_getrandmax()));
    }
    /**
     * @param Aum_Model_User $user
     */
    public function login(Aum_Model_User $user) {
        $this->user = $user;
        $this->httpClient->resetParameters(true);
        $this->httpClient->setParameterPost('login', $this->user->getEmail());
        $this->httpClient->setParameterPost('password', $this->user->getPassword());
        $this->httpClient->setParameterPost('x_1', '1');
        $this->httpClient->setParameterPost('y_1', '1');
        $this->httpClient->setParameterPost('remember', 'true');
        $response = $this->sendRequest($this->config->aum->link->action->{__FUNCTION__}, Zend_Http_Client::POST);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function logout() {
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($this->config->aum->link->action->{__FUNCTION__}, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function acceptCharm($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId, $this->getAumAnticahe());
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function addToBasket($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId);
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function addToFavorites($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId, $this->getAumAnticahe());
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function alertBoulayz($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId);
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function kickFromBasket($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId);
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function refuseCharm($aumId) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId, $this->getAumAnticahe());
        $this->httpClient->resetParameters();
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * @return boolean
     */
    public function sendMessage($destinationAumId, $message) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $destinationAumId);
        $this->httpClient->resetParameters();
        $this->httpClient->setParameterPost('message', $message);
        $this->httpClient->setParameterPost('x_1', '1');
        $this->httpClient->setParameterPost('y_1', '1');
        $response = $this->sendRequest($uri, Zend_Http_Client::POST);
        return $response->isSuccessful();
    }
    /**
     * AND ACTIONS
     */
}
?>
