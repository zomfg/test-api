<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBasketPage
 *
 * @author dirk
 */
class AumBasketPage extends AumPage{

    private $products = array();

    function __construct() {
        
    }
    
    public function &getProducts() {
        return $this->visitors;
    }

        public function addProduct($product){
        
        array_push($this->products, $product);
    }
}
?>
