<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_NewCharm
 *
 * @author dirk
 */
class Aum_Factory_NewCharm extends Aum_Factory_Abstract{
    function __construct() {

    }

    /**
     * @return Aum_Page_NewCharm
     */
    public function createPage(){
        return new Aum_Page_NewCharm();
    }

    /**
     * @return Aum_Parser_NewCharm
     */
    public function createParser(){
        return new Aum_Parser_NewCharm();
    }
}
?>
