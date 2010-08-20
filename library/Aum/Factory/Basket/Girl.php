<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_Basket_Girl
 *
 * @author dirk
 */
class Aum_Factory_Basket_Girl extends Aum_Factory_Abstract{
    function __construct() {
        
    }


    /**
     * @return Aum_Page_Basket_Girl
     */
    public function createPage(){
        return new Aum_Page_Basket_Girl();
    }

    /**
     * @return Aum_Parser_Basket_Girl
     */
    public function createParser(){
        return new Aum_Parser_Basket_Girl();
    }

}
?>
