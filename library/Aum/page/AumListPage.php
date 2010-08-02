<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumListPagePage
 *
 * @author dirk
 */
class AumListPage extends AumPage{

    private $visitors = array();

    function __construct() {
        
    }

    public function &getVisitors(){
        return $this->visitors;
    }
    
    public function addVisitor(AumMiniProfile $visitor){
        array_push($this->getVisitors(), $visitor);
    }
    
}
?>
