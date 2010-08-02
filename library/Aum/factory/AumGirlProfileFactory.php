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
class AumGirlProfileFactory {
    function __construct() {

    }

    /**
     * @return AumProfilePage
     */
    public function createPage(){
        return new AumGirlProfilePage();
    }

    /**
     * @return AumProfileParser
     */
    public function createParser(){
        return new AumGirlProfileParser();
    }
}
?>
