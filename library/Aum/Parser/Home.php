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
     * @param AumHomePage $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        $this->dom->load($aumPage->getHtmlBody());

        $this->parseNumbers($aumPage);
        $this->parseMiniatures($aumPage);
    }

    /**
     * @param AumHomePage $aumPage
     */
    private function parseNumbers(AumHomePage $aumPage){

        $newMails = $this->dom->find('span[id=mailsCounter]', 0);
        $newVisits = $this->dom->find('span[id=visitesCounter]', 0);
        $newBaskets = $this->dom->find('span[id=flashsCounter]', 0);
        $baskets = $this->dom->find('big[id=basketCount]', 0);
        $popularity = $this->dom->find('big[id=popScore]', 0);
        
        $aumPage->setNewMailsCounter($newMails->plaintext);
        $aumPage->setNewBasketsCounter($newBaskets->plaintext);
        $aumPage->setNewVisitsCounter($newVisits->plaintext);
        $aumPage->setBasketsCounter($baskets->plaintext);
        $aumPage->setPopularity($popularity->plaintext);
    }
    
    /**
     * @param AumHomePage $aumPage
     */
    private function parseMiniatures(AumHomePage $aumPage){
        
    }
}
?>
