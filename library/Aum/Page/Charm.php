<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Charm
 *
 * @author dirk
 */
class Aum_Page_Charm extends Aum_Page_Abstract{
    public function __construct() {
        $this->configPageKey = 'charm';
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
