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
class AumBoyProfileFactory {
    function __construct() {

    }

    /**
     * @return AumBoyProfilePage
     */
    public function createPage(){
        return new AumBoyProfilePage();
    }

    /**
     * @return AumBoyProfileParser
     */
    public function createParser(){
        return new AumBoyProfileParser();
    }
}
?>
