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
            throw new Exception($response->getMessage());
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
    public function login(Aum_Model_User &$user) {
        $this->user = $user;
        $this->httpClient->resetParameters(true);
        $this->httpClient->setParameterPost(
                $this->config->aum->paramKey->login->login,
                $this->user->getEmail());
        $this->httpClient->setParameterPost(
                $this->config->aum->paramKey->login->password,
                $this->user->getPassword());
        $this->httpClient->setParameterPost(
                $this->config->aum->paramKey->login->submit,
                $this->config->aum->paramKey->login->submitValue);
        $this->httpClient->setParameterPost(
                $this->config->aum->paramKey->login->remember,
                $this->config->aum->paramKey->login->rememberValue);
        $response = $this->sendRequest($this->config->aum->link->action->{__FUNCTION__}, Zend_Http_Client::POST);
        if (!$response->isSuccessful())
            throw new Exception ($response->getMessage());
        $cookies = $this->httpClient->getCookieJar()->getAllCookies();
        if (is_array($cookies))
            foreach ($cookies as $cookie)
                if ($cookie->getName() == $this->config->aum->paramKey->cookie->id && is_numeric($cookie->getValue())) {
                    $user->setId($cookie->getValue());
                    break ;
                }
        return $user->isLoggedIn();
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
     * @param integer $destinationAumId
     * @param string $message
     * @return boolean
     */
    public function sendMessage($destinationAumId, $message) {
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $destinationAumId);
        $this->httpClient->resetParameters();
        $this->httpClient->setParameterPost($this->config->aum->paramKey->thread->message, $message);
        $this->httpClient->setParameterPost($this->config->aum->paramKey->thread->submit,
                $this->config->aum->paramKey->thread->submitValue);
        $response = $this->sendRequest($uri, Zend_Http_Client::POST);
        return $response->isSuccessful();
    }

    /**
     * @param array $threads
     * @return boolean
     */
    public function deleteThreads(array $threads) {
        $this->httpClient->resetParameters();
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        foreach ($threads as $thread)
            $this->httpClient->setParameterPost($this->config->aum->paramKey->deleteThreads->id, $thread);
        $this->httpClient->setParameterPost($this->config->aum->paramKey->deleteThreads->submit,
                $this->config->aum->paramKey->deleteThreads->submitValue);
        $response = $this->sendRequest($this->config->aum->link->action->{__FUNCTION__}, Zend_Http_Client::POST);
        return $response->isSuccessful();
    }

    public function blockMember($aumId) {
        $this->httpClient->resetParameters();
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId);
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    public function getOutFromBasket($aumId) {
        $this->httpClient->resetParameters();
        $uri = $this->config->aum->link->action->{__FUNCTION__};
        $uri = sprintf($uri, $aumId);
        $response = $this->sendRequest($uri, Zend_Http_Client::GET);
        return $response->isSuccessful();
    }

    /**
     * AND ACTIONS
     */
}
?>
