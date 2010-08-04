<?php
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
        require_once(APPLICATION_PATH.'/../library/simple_html_dom/simple_html_dom.php');
        $this->dom = new simple_html_dom();
        $this->dom->load($aumPage->getHtmlBody());
    }

    public function sanitize($string) {
        return (trim($string));
    }
}
?>
