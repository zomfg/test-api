<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Abstract
 *
 * @author dirk
 */
abstract class Aum_Page_Abstract implements Aum_Page_Interface{

    /**
     * @var string
     */
    protected $htmlBody;
    
    /**
     * @return string
     */
    public function getHtmlBody(){
        return $this->htmlBody;
    }
    /*
     * @param string $htmlCode
     */
    public function setHtmlBody($htmlCode){
        $this->htmlBody  = $htmlCode;
    }


    /**
     * @param Aum_Parser_Interface $parser
     */
    public function parse(Aum_Parser_Interface $parser) {
        $parser->parse($this);
    }

    /**
     * @return string
     */
    public function getURL() {
        return AumConfig::Config()->getUrl($this);
    }
}
?>
