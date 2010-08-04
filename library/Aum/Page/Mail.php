<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Mail
 *
 * @author dirk
 */
class Aum_Page_Mail extends Aum_Page_Abstract{
    /**
     * @var array
     */
    private $visitorThreads = array();

    public function __construct() {
        $this->configPageKey = 'mail';
    }

    /**
     * @return array
     */
    public function getThreads() {
        return $this->visitorThreads;
    }

    /**
     * @param array $threads
     */
    public function addThread($visitor, $thread, $subject, $time) {
        array_push($this->visitorThreads, array('contact' => $visitor,
                                                'thread_url' => $thread,
                                                'subject' => $subject,
                                                'time' => $time
                                                ));
    }

    public function toArray() {
        $data = array();
        return $data;
    }
}
?>
