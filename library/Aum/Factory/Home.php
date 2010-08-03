<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_Home
 *
 * @author dirk
 */
class Aum_Factory_Home extends Aum_Factory_Abstract {
    
    function __construct() {

    }

    /**
     * @return Aum_Page_Home
     */
    public function createPage(){
        return new Aum_Page_Home();
    }

    /**
     * @return Aum_Parser_Home
     */
    public function createParser(){
        return new Aum_Parser_Home();
    }
}
?>
