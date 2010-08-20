<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Basket_Girl
 *
 * @author dirk
 */
class Aum_Page_Basket_Girl extends Aum_Page_Abstract {

    private $people = array();
    private $contacts = array();
    
    public function __construct() {
        $this->configPageKey = 'basket';
    }
    
    public function getProducts() {
        return $this->people;
    }

    public function addProduct(Aum_Model_MiniProfile $product){
        array_push($this->people, $product);
    }

    public function getContacts() {
        return $this->contacts;
    }

    public function addContact(Aum_Model_MiniProfile $contact){
        array_push($this->contacts, $contact);
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
