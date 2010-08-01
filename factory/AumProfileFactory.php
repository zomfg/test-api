<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumProfileFactory
 *
 * @author dirk
 */
class AumProfileFactory {
    function __construct() {

    }

    /**
     * @return AumProfilePage
     */
    public function createPage(){
        return new AumProfilePage();
    }

    /**
     * @return AumProfileParser
     */
    public function createParser(){
        return new AumProfileParser();
    }
}
?>
