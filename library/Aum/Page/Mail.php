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
    private $threads = array();

    public function __construct() {
        $this->configPageKey = 'mail';
    }

    /**
     * @return array
     */
    public function getThreads() {
        return $this->threads;
    }

    /**
     * @param Aum_Model_Mail $mail
     */
    public function addThread(Aum_Model_Mail $mail) {
        array_push($this->threads, $mail);
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
