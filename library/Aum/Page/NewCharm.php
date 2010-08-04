<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_NewCharm
 *
 * @author dirk
 */
class Aum_Page_NewCharm  extends Aum_Page_Abstract{
    private $guys = array();
    
    function __construct() {

    }

    public function setHtmlBody($htmlBody){
        parent::setHtmlBody('<?xml version="1.0" encoding="iso-8859-15"?>' . html_entity_decode($htmlBody));
    }

    public function addGuy(Aum_Model_MiniProfile $guy){
        array_push($this->guys, $guy);
    }

    public function getGuys(){
        return $this->guys;
    }
}
?>
