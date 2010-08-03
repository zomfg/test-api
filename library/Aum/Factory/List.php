<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_List
 *
 * @author dirk
 */
class Aum_Factory_List extends Aum_Factory_Abstract{
    function __construct() {
        
    }

    /**
     * @return Aum_Page_List
     */
    public function createPage(){
        return new Aum_Page_List();
    }

    /**
     * @return Aum_Parser_List
     */
    public function createParser(){
        return new Aum_Parser_List();
    }
}
?>
