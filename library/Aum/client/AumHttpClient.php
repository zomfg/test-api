<?php
/**
 * Description of AumHttpClient
 *
 * @author johndoe
 */
class AumHttpClient extends AbstractAumClient {
    /**
     * @var IHttpClient
     */
    private $client = null;


    public function __construct() {
    }

    public function init(AumUser $user) {
        if (!parent::init($user))
            return false;
        $this->client = new CurlHttpClient();
        $this->client->setCookieJar(md5($this->user->getEmail()));
        return true;
    }

    public function login() {
        $params = array( // post
            'login' => $this->user->getEmail(),
            'password' => $this->user->getPassword(),
            'x_1' => 1,
            'y_1' => 1,
            'remember' => 'true'
            );
        return $this->client->sendPostRequest($this->getActionUrl(__FUNCTION__), $params);
        //$params = array('login' => $this->user->getEmail(), 'pass' => $this->user->getPassHash()); // get
    }

    public function  logout() {
        $this->client->sendGetRequest($this->getActionUrl(__FUNCTION__));
        return $this->client;
    }

    public function sendMessage($aumId, $message) {
        $params = array( // post
            'message' => $message,
            'x_1' => 1,
            'y_1' => 1,
            );
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId);
        echo $url;
        return $this->client->sendPostRequest($url, $params);
    }

    public function acceptCharm($aumId) {
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId, 0.42);
        return $this->client->sendGetRequest($url);
    }

    public function refuseCharm($aumId) {
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId, 0.42);
        return $this->client->sendGetRequest($url);
    }

    public function alertBoulayz($aumId) {
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId);
        return $this->client->sendGetRequest($url);
    }

    /**
     * charm (dude) / basket (chick)
     */
    public function addToFavorites($aumId) {
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId, 0.42);
        return $this->client->sendGetRequest($url);
    }

    /**
     * for chicks only
     */
    public function kickFromBasket($aumId) {
        $url = sprintf($this->getActionUrl(__FUNCTION__), $aumId);
        return $this->client->sendGetRequest($url);
    }

    /**
     * @param string $page
     * @return string
     */
    public function getPage($page) {
        $this->client->sendGetRequest($page);
        return $this->client;
    }
}
?>
