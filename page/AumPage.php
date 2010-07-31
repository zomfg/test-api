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
class AumPage implements IAumPage{
    /*
     * @var string
     */
    protected $htmlBody;
    
    /*
     * @param string $htmlCode
     */
    function __construct() {
        
    }

    /*
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


    /*
     * @param IAumParser $parser
     */
    public function Parse(IAumParser $parser) {
        $parser->Parse($this);
    }

    /*
     * @return string
     */
    public function getURL() {
        return AumConfig::Config()->getUrl($this);
    }
}
?>
