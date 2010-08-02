<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumPage
 *
 * @author dirk
 */
abstract class AumPage implements IAumPage{

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
     * @param IAumParser $parser
     */
    public function parse(IAumParser $parser) {
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
