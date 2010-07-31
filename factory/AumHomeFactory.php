<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumHomeFactory
 *
 * @author dirk
 */
class AumHomeFactory {
    
    function __construct() {

    }

    public function createPage(){
        return new AumHomePage();
    }

    public function createParser(){
        return new AumHomeParser();
    }
}
?>
