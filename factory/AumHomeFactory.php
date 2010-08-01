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
class AumHomeFactory extends AbstractAumFactory {
    
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
