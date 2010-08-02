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

    private $visitors = array();

    function __construct() {
        parent::__construct();
    }
    
    public function &getVisitors() {
        return $this->visitors;
    }

        public function addVisitor($url, $name, $age, $city, $thumb){
        
        array_push($this->visitors, array('url'   => $url,
                                          'name'  => $name,
                                          'age'   => $age,
                                          'city'  => $city,
                                          'thumb' => $thumb
                                         ));
    }
}
?>
