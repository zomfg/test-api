<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumMailFactory
 *
 * @author dirk
 */
class AumMailFactory extends AbstractAumFactory {
    function __construct() {

    }

    /**
     * @return AumMailPage
     */
    public function createPage(){
        return new AumMailPage();
    }

    /**
     * @return AumMailParser 
     */
    public function createParser(){
        return new AumMailParser();
    }
}
?>
