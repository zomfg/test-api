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
class Aum_Page_Basket_Boy extends Aum_Page_Abstract{

    private $girls = array();

    function __construct() {

    }

    public function getGirls() {
        return $this->girls;
    }

    public function addVisitor(Aum_Model_MiniProfile $product){
        array_push($this->girls, $product);
        echo "added";
    }



}
?>