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
    private $visitorThreads = array();

    public function __construct() {
        
    }

    /**
     * @return array
     */
    public function getThreads() {
        return $this->$visitorThreads;
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


}
?>
