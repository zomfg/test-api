<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Basket_Boy
 *
 * @author dirk
 */
class Aum_Page_Basket_Boy extends Aum_Page_Abstract {

    private $people = array();

    public function __construct() {
        $this->configPageKey = 'basket';
    }

    public function getGirls() {
        return $this->people;
    }

    public function addVisitor(Aum_Model_MiniProfile $product){
        array_push($this->people, $product);
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
