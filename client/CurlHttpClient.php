<?php

/**
 * Description of CurlHttpClient
 *
 * @author johndoe
 */
class CurlHttpClient implements IHttpClient {

    private $curlHandler = null;
    protected $_useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1';
    protected $url = null;
    protected $_followlocation;
    protected $_timeout = 30;
    protected $_maxRedirects = 4;
    protected $_cookieFileLocation = './cookie.txt';
    protected $_post = false;
    protected $_postFields = array();
    protected $_referer = "http://www.google.com";
    protected $_session;
    protected $_webpage = null;
    protected $_includeHeader;
    protected $_noBody;
    protected $_status;
    protected $_binaryTransfer;
    private $authentication = 0;
    private $auth_name = '';
    private $auth_pass = '';

    public function __construct($followlocation = true, $timeOut = 30, $maxRedirecs = 4, $binaryTransfer = false, $includeHeader = false, $noBody = false) {
        $this->_followlocation = $followlocation;
        $this->_timeout = $timeOut;
        $this->_maxRedirects = $maxRedirecs;
        $this->_noBody = $noBody;
        $this->_includeHeader = $includeHeader;
        $this->_binaryTransfer = $binaryTransfer;

        $this->_cookieFileLocation = dirname(__FILE__) . '/cookie.txt';
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
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($this->curlHandler, CURLOPT_TIMEOUT, $this->_timeout);
        curl_setopt($this->curlHandler, CURLOPT_MAXREDIRS, $this->_maxRedirects);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_FOLLOWLOCATION, $this->_followlocation);
        curl_setopt($this->curlHandler, CURLOPT_COOKIEJAR, $this->_cookieFileLocation);
        curl_setopt($this->curlHandler, CURLOPT_COOKIEFILE, $this->_cookieFileLocation);
        curl_setopt($this->curlHandler, CURLOPT_USERAGENT, $this->_useragent);
        curl_setopt($this->curlHandler, CURLOPT_REFERER, $this->_referer);
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

    public function setPost($postFields) {
        $this->_post = true;
        $this->_postFields = $postFields;
    }

    public function setUserAgent($userAgent) {
        $this->_useragent = $userAgent;
    }

    public function sendGetRequest($url = null, array $data = null) {
        if ($url == null && $this->url == null)
            return ;
        if ($url != null)
            $this->url = $url;
        if ($data != null)
            $this->_postFields = $data;
        curl_setopt($this->curlHandler, CURLOPT_POST, false);
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
        /*
          if($this->_binary)
          {
          curl_setopt($s,CURLOPT_BINARYTRANSFER,true);
          }
        */
        $result = curl_setopt($this->curlHandler, CURLOPT_URL, $this->url);
        $this->_webpage = curl_exec($this->curlHandler);
        $this->_status = curl_getinfo($this->curlHandler, CURLINFO_HTTP_CODE);
        return $result;
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

    public function __tostring() {
        return $this->_webpage;
    }
}
?>
