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
abstract class Aum_Page_Abstract extends Aum_Abstract implements Aum_Page_Interface {
    protected $configPageKey = null;
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
        return Aum_Config::get()->aum->link->page->{$this->configPageKey};
    }

    /**
     * @param array $properties
     * @param array $filter
     * @return array
     */
    protected function filterArray(array $properties, array $filter = array()) {
        return parent::filterArray($properties, array_merge(array('configPageKey', 'htmlBody'), $filter));
    }
}
?>
