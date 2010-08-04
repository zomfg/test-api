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
    
    public function __construct() {

    }

    /**
     * @param string $htmlBody
     */
    public function setHtmlBody($htmlBody){
        parent::setHtmlBody('<?xml version="1.0" encoding="iso-8859-15"?>' . html_entity_decode($htmlBody));
    }
}
?>
