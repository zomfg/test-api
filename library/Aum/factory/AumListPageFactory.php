<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumListPageFactory
 *
 * @author dirk
 */
class AumListPageFactory extends AbstractAumFactory{
    function __construct() {
        
    }

    /**
     * @return AumListPage
     */
    public function createPage(){
        return new AumListPage();
    }

    /**
     * @return AumListPageParser
     */
    public function createParser(){
        return new AumListPageParser();
    }
}
?>
