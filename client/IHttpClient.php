<?php
/**
 *
 * @author johndoe
 */
interface IHttpClient {
    public function setCookieJar($cookieJar);
    public function sendGetRequest($url = null, array $data = null);
    public function sendPostRequest($url = null, array $data = null);
}
?>
