<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_Basket_Boy
 *
 * @author dirk
 */
class Aum_Factory_Basket_Boy extends Aum_Factory_Abstract{
    function __construct() {

    }


    /**
     * @return Aum_Page_Basket_Boy
     */
    public function createPage(){
        return new Aum_Page_Basket_Boy();
    }

    /**
     * @return Aum_Parser_Basket_Boy
     */
    public function createParser(){
        return new Aum_Parser_Basket_Boy();
    }

}
?>
