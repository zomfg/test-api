<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyBasketFactory
 *
 * @author dirk
 */
class AumBoyBasketFactory extends AbstractAumFactory{
    function __construct() {

    }


    /**
     * @return AumBoyBasketPage
     */
    public function createPage(){
        return new AumBoyBasketPage();
    }

    /**
     * @return AumBoyBasketParser
     */
    public function createParser(){
        return new AumBoyBasketParser();
    }

}
?>
