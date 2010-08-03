<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyBasketPage
 *
 * @author dirk
 */
class AumBoyBasketPage extends AumPage{

    private $girls = array();

    function __construct() {

    }

    public function getGirls() {
        return $this->girls;
    }

    public function addVisitor(AumMiniProfile $product){
        array_push($this->girls, $product);
        echo "added";
    }



}
?>
