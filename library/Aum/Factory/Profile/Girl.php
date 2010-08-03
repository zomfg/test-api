<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_Profile_Girl
 *
 * @author dirk
 */
class Aum_Factory_Profile_Girl {
    function __construct() {

    }

    /**
     * @return Aum_Page_Profile_Girl
     */
    public function createPage(){
        return new Aum_Page_Profile_Girl();
    }

    /**
     * @return Aum_Parser_Profile_Girl
     */
    public function createParser(){
        return new Aum_Parser_Profile_Girl();
    }
}
?>
