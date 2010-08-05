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
    private $aumId = 0;
    public function __construct($aumId) {
        $this->aumId = $aumId;
    }

    public function createPage() {
        return new Aum_Page_Thread($this->aumId);
    }

    public function createParser() {
        return new Aum_Parser_Thread();
    }

}
?>
