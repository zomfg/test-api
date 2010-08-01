<?php

/**
 * Description of CurlHttpClient
 *
 * @author johndoe
 */
class CurlHttpClient implements IHttpClient {

    private $curlHandler    = null;
    protected $_useragent   = null;
    protected $url          = null;
    protected $_followlocation = true;
    protected $_timeout     = 30;
    protected $_maxRedirects= 4;
    protected $_cookieFileLocation = './cookies/cookie.txt';
    protected $_postFields  = array();
    protected $_referer     = "http://www.adopteunmec.com";
    protected $_session;
    protected $_webpage     = null;
    protected $_includeHeader = true;
    protected $_noBody      = false;
    protected $_status      = null;
    protected $_binaryTransfer = false;
    private $authentication = 0;
    private $auth_name      = '';
    private $auth_pass      = '';

    public function __construct() {
        $this->init();
    }

    public function __destruct() {
        if ($this->curlHandler)
            curl_close($this->curlHandler);
    }

    private function init() {
        $this->curlHandler = curl_init();
        if (!$this->curlHandler)
            return false;

        $this->setUserAgent(UserAgent::get());
        $this->setCookieJar('cookie');
        return true;
    }

    public function useAuth($use) {
        $this->authentication = 0;
        if ($use == true)
            $this->authentication = 1;
    }

    public function setAuthName($name) {
        $this->auth_name = $name;
    }

    public function setAuthPass($pass) {
        $this->auth_pass = $pass;
    }

    public function setReferer($referer) {
        $this->_referer = $referer;
    }

    public function setCookiFileLocation($path) {
        $this->_cookieFileLocation = $path;
    }

    public function setUserAgent($userAgent) {
        $this->_useragent = $userAgent;
    }

    public function getHttpStatus() {
        return $this->_status;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setCookieJar($cookieJar) {
        $this->_cookieFileLocation = dirname(__FILE__) . '/cookies/'.$cookieJar.'.txt';
    }

    public function setTimeout($_timeout) {
        $this->_timeout = $_timeout;
    }

    public function setMaxRedirects($_maxRedirects) {
        $this->_maxRedirects = $_maxRedirects;
    }

    public function setIncludeHeader($_includeHeader) {
        $this->_includeHeader = $_includeHeader;
    }

    public function setNoBody($_noBody) {
        $this->_noBody = $_noBody;
    }

    public function setBinaryTransfer($_binaryTransfer) {
        $this->_binaryTransfer = $_binaryTransfer;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function sendGetRequest($url = null, array $data = null) {
        if ($url == null && $this->url == null)
            return ;
        if ($url != null)
            $this->url = $url;
        if ($data != null)
            $this->_postFields = $data;
        curl_setopt($this->curlHandler, CURLOPT_HTTPGET, true);
        $this->url = $url .'?'. http_build_query($this->_postFields);
        return $this->sendRequest();
    }

    public function sendPostRequest($url = null, array $data = null) {
        if ($url == null && $this->url == null)
            return ;
        if ($url != null)
            $this->url = $url;
        if ($data != null)
            $this->_postFields = $data;
        curl_setopt($this->curlHandler, CURLOPT_POST, true);
        curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, http_build_query($this->_postFields));
        return $this->sendRequest();
    }

    private function sendRequest() {
        if ($this->url == null)
            return;
        if ($this->authentication == 1)
            curl_setopt($this->curlHandler, CURLOPT_USERPWD, $this->auth_name . ':' . $this->auth_pass);

        if ($this->_includeHeader)
            curl_setopt($this->curlHandler, CURLOPT_HEADER, true);

        if ($this->_noBody)
            curl_setopt($this->curlHandler, CURLOPT_NOBODY, true);
        curl_setopt($this->curlHandler, CURLOPT_REFERER, $this->_referer);
        curl_setopt($this->curlHandler, CURLOPT_USERAGENT, $this->_useragent);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($this->curlHandler, CURLOPT_TIMEOUT, $this->_timeout);
        curl_setopt($this->curlHandler, CURLOPT_MAXREDIRS, $this->_maxRedirects);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_FOLLOWLOCATION, $this->_followlocation);
        curl_setopt($this->curlHandler, CURLOPT_COOKIEJAR, $this->_cookieFileLocation);
        curl_setopt($this->curlHandler, CURLOPT_COOKIEFILE, $this->_cookieFileLocation);
//        if($this->_binary)
//            curl_setopt($s,CURLOPT_BINARYTRANSFER,true);
        $result = curl_setopt($this->curlHandler, CURLOPT_URL, $this->url);
        $this->_webpage = curl_exec($this->curlHandler);
        $this->_status = curl_getinfo($this->curlHandler, CURLINFO_HTTP_CODE);
        return $result;
    }

    public function __tostring() {
        return $this->_webpage;
    }
}
?>
