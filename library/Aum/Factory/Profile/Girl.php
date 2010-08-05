<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Factory_Profile_Girl
 *
 * @author dirk
 */
class Aum_Factory_Profile_Girl {
    /**
     * @var integer
     */
    private $aumId = 0;

    public function __construct($aumId) {
        $this->aumId = $aumId;
    }

    /**
     * @return Aum_Page_Profile_Girl
     */
    public function createPage(){
        return new Aum_Page_Profile_Girl($this->aumId);
    }

    /**
     * @return Aum_Parser_Profile_Girl
     */
    public function createParser(){
        return new Aum_Parser_Profile_Girl();
    }
}
?>
