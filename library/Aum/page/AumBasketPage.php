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

        public function addProduct($url, $name, $age, $city, $thumb){
        
        array_push($this->products, array('url'   => $url,
                                          'name'  => $name,
                                          'age'   => $age,
                                          'city'  => $city,
                                          'thumb' => $thumb
                                         ));
    }
}
?>
