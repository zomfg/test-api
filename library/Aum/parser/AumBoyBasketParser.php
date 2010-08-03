<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyBasketParser
 *
 * @author dirk
 */
class AumBoyBasketParser extends AumParser{

    public function __construct() {

    }

    /**
     * @param AumBoyBasketPage $aumPage
     */
    public function parse(IAumPage $aumPage){
        parent::parse($aumPage);

        $parser = new AumListPageParser();
        $parser->parse($aumPage);

    }
}
?>
