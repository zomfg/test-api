<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Chat
 *
 * @author dirk
 */
class Aum_Page_Chat extends Aum_Page_Abstract{
    public function __construct() {
        $this->configPageKey = 'chat';
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
