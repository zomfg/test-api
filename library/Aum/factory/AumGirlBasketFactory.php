<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumGirlBasketFactory
 *
 * @author dirk
 */
class AumGirlBasketFactory extends AbstractAumFactory{
    function __construct() {
        
    }


    /**
     * @return AumGirlBasketPage
     */
    public function createPage(){
        return new AumGirlBasketPage();
    }

    /**
     * @return AumGirlBasketParser
     */
    public function createParser(){
        return new AumGirlBasketParser();
    }

}
?>
