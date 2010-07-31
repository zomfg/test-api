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

    public function connect(AumUser $user) {
        if (!parent::connect($user))
            return false;
        $this->client = new CurlHttpClient();
        $params = array( // post
            'login' => $this->user->getEmail(),
            'password' => $this->user->getPassword(),
            'x_1' => 1,
            'y_1' => 1,
            'remember' => 'true'
            );
        $this->client->sendPostRequest('http://www.adopteunmec.com/redirect.php?action=login', $params);
        //$params = array('login' => $this->user->getEmail(), 'pass' => $this->user->getPassHash()); // get
        return true;
    }

    public function  disconnect() {
        $this->client->sendGetRequest('http://www.adopteunmec.com/redirect.php?action=logout');
        parent::disconnect();
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
