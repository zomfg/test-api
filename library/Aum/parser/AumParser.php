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
    /**
     * @var simple_html_dom
     */
    protected $dom;

    public function parse(IAumPage $aumPage){
        $this->dom = new simple_html_dom();
        $this->dom->load($aumPage->getHtmlBody());
    }

}
?>
