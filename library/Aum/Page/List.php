<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_ListPage
 *
 * @author dirk
 */
class Aum_Page_List extends Aum_Page_Abstract{

    private $visitors = array();

    function __construct() {
        
    }

    public function &getVisitors(){
        return $this->visitors;
    }
    
    public function addVisitor(Aum_Model_MiniProfile $visitor){
        array_push($this->getVisitors(), $visitor);
    }
    
}
?>
