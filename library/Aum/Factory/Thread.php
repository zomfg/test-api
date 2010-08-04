<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thread
 *
 * @author dirk
 */
class Aum_Factory_Thread extends Aum_Factory_Abstract{
    function __construct() {

    }

    public function createPage() {
        return new Aum_Page_Thread();
    }

    public function createParser() {
        return new Aum_Parser_Thread();
    }

}
?>
