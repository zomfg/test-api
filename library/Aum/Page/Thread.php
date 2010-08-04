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
class Aum_Page_Thread extends Aum_Page_Abstract{
    private $contact = 0;
    private $messages = array();

    function __construct() {

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
}
?>
