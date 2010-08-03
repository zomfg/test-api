<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumGirlBasketPage
 *
 * @author dirk
 */
class AumGirlBasketPage extends AumPage{

    private $products = array();
    private $contacts = array();
    
    function __construct() {
        
    }
    
    public function &getProducts() {
        return $this->products;
    }

        public function addProduct(AumMiniProfile $product){
        
        array_push($this->getProducts(), $product);
    }

    public function &getContacts() {
        return $this->contacts;
    }

    public function addContact(AumMiniProfile $contact){
        array_push($this->getContacts(), $contact);
    }


}
?>
