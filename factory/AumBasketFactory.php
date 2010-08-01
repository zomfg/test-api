<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBasketParserFactory
 *
 * @author dirk
 */
class AumBasketFactory extends AbstractAumFactory{
    function __construct() {
        
    }


    /**
     * @return AumBasketPage
     */
    public function createPage(){
        return new AumBasketPage();
    }

    /**
     * @return AumBasketParser
     */
    public function createParser(){
        return new AumBasketParser();
    }

}
?>
