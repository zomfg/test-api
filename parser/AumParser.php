<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumParser
 *
 * @author dirk
 */
abstract class AumParser implements IAumParser {
    protected $dom;

    function __construct() {
        $this->dom = new simple_html_dom();
    }

}
?>
