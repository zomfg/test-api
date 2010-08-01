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
        return $this->client->sendPostRequest('http://www.adopteunmec.com/redirect.php?action=login', $params);
        //$params = array('login' => $this->user->getEmail(), 'pass' => $this->user->getPassHash()); // get
    }

    public function  logout() {
        $this->client->sendGetRequest('http://www.adopteunmec.com/redirect.php?action=logout');
        return $this->client;
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
