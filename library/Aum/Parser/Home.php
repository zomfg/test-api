<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Home
 *
 * @author dirk
 */
class Aum_Parser_Home extends Aum_Parser_Abstract{

    public function __construct() {
        
    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        //$this->dom->load($aumPage->getHtmlBody());
        parent::parse($aumPage);
        $this->parseNumbers($aumPage);
        $this->parseMiniatures($aumPage);
    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    private function parseNumbers(Aum_Page_Interface $aumPage) {
        $newMails = $this->dom->find('span[id=mailsCounter]', 0);
        $newVisits = $this->dom->find('span[id=visitesCounter]', 0);
        $newBaskets = $this->dom->find('span[id=flashsCounter]', 0);
        $baskets = $this->dom->find('big[id=basketCount]', 0);
        $popularity = $this->dom->find('big[id=popScore]', 0);

        $aumPage->setNewMailsCounter($this->sanitize($newMails->plaintext));
        $aumPage->setNewBasketsCounter($this->sanitize($newBaskets->plaintext));
        $aumPage->setNewVisitsCounter($this->sanitize($newVisits->plaintext));
        $aumPage->setBasketsCounter($this->sanitize($baskets->plaintext));
        $aumPage->setPopularity($this->sanitize($popularity->plaintext));
    }
    
    /**
     * @param AumHomePage $aumPage
     */
    private function parseMiniatures(Aum_Page_Interface $aumPage){
        
    }
}
?>
