<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumMailFactory
 *
 * @author dirk
 */
class AumMailFactory {
    function __construct() {

    }

    public function createPage(){
        return new AumMailPage();
    }

    public function createParser(){
        return new AumMailParser();
    }
}
?>
