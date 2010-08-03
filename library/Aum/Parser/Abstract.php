<?php
require_once('../library/simple_html_dom/simple_html_dom.php');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Abstract
 *
 * @author dirk
 */
abstract class Aum_Parser_Abstract implements Aum_Parser_Interface {
    /**
     * @var simple_html_dom
     */
    protected $dom;

    public function parse(Aum_Page_Interface $aumPage){
        $this->dom = new simple_html_dom();
        $this->dom->load($aumPage->getHtmlBody());
    }

}
?>
