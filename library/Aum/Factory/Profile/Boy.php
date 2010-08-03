<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyProfileFactory
 *
 * @author dirk
 */
class Aum_Factory_Profile_Boy {
    function __construct() {

    }

    /**
     * @return Aum_Page_Profile_Boy
     */
    public function createPage(){
        return new Aum_Page_Profile_Boy();
    }

    /**
     * @return Aum_Parser_Profile_Boy
     */
    public function createParser(){
        return new Aum_Parser_Profile_Boy();
    }
}
?>
