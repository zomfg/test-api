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

    public function sanitize($string, $utf8 = -1) {
        if ($utf8 < 0)
            $utf8 = Aum_Config::get()->aum->parser->sanitize->utf8;
        if ($utf8 == 1)
            $string = utf8_decode($string);
        else if ($utf8 == 2)
            $string = utf8_encode($string);

        $string = html_entity_decode($string);
        $string = strip_tags($string);
        $string = str_replace(array('&#39;', '&nbsp;', "‘", "’", "-"), array("'", " ", "'", "'", '-'), $string);
        $string = preg_replace('/ +/', ' ', $string);
        return (trim($string));
    }
}
?>
