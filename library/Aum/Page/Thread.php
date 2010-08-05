<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Thread
 *
 * @author dirk
 */
class Aum_Page_Thread extends Aum_Page_Abstract {
    /**
     * @var integer
     */
    private $contact = 0;
    /**
     * @var array
     */
    private $messages = array();

    function __construct($aumId) {
        $this->setContact($aumId);
        $this->configPageKey = 'thread';
    }
    
    public function getContact() {
        return $this->contact;
    }

    public function setContact($contact) {
        $this->contact = $contact;
    }

    public function addMessage($time, $message){
        array_push($this->messages, array($time => $message));
    }

    public function getMessages(){
        return $this->messages;
    }

    public function  getURL() {
        $url = parent::getURL();
        return (sprintf($url, $this->contact));
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
