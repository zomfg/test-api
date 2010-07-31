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
     * @param string $htmlCode
     */
    public function setHtmlBody($htmlCode){
        $this->htmlBody  = $htmlCode;
    }

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
