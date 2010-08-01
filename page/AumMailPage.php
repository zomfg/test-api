<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumMailPage
 *
 * @author dirk
 */
class AumMailPage extends AumPage{

    /**
     * @var array
     */
    private $threadsUrl;

    public function __construct() {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getThreadsUrl() {
        return $this->threadsUrl;
    }

    /**
     * @param array $threadsUrl
     */
    public function setThreadsUrl($threadsUrl) {
        $this->threadsUrl = $threadsUrl;
    }


}
?>
