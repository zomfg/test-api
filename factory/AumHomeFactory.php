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

    /**
     * @return AumHomePage
     */
    public function createPage(){
        return new AumHomePage();
    }

    /**
     * @return AumHomeParser
     */
    public function createParser(){
        return new AumHomeParser();
    }
}
?>
