<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_List
 *
 * @author dirk
 */
class Aum_Page_List extends Aum_Page_Abstract {
    /**
     * @var array
     */
    private $people = array();

    public function __construct($configPageKey = 'visit') {
        $this->configPageKey = $configPageKey;
    }

    public function getVisitors(){
        return $this->people;
    }

    /**
     * @param Aum_Model_MiniProfile $visitor
     */
    public function addVisitor(Aum_Model_MiniProfile $visitor){
        array_push($this->people, $visitor);
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
