<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Basket_Boy
 *
 * @author dirk
 */
class Aum_Parser_Basket_Boy extends Aum_Parser_Abstract{

    public function __construct() {

    }

    /**
     * @param AumBoyBasketPage $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);

        $parser = new Aum_Parser_List();
        $parser->parse($aumPage);

    }
}
?>
