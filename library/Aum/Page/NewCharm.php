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
class Aum_Page_NewCharm  extends Aum_Page_Abstract {
    private $people = array();
    
    public function __construct() {
        $this->configPageKey = 'newCharm';
    }

    /**
     * @param string $htmlBody
     */
    public function setHtmlBody($htmlBody){
        parent::setHtmlBody('<?xml version="1.0" encoding="iso-8859-15"?>' . html_entity_decode($htmlBody));
    }

    public function addGuy(Aum_Model_MiniProfile $guy) {
        $this->people = array_pad($this->people, -(count($this->people) + 1), $guy);
    }

    public function getGuys(){
        return $this->people;
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
