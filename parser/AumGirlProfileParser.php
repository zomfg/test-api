<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumProfileParser
 *
 * @author dirk
 */
class AumGirlProfileParser extends AumProfileParser{
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param IAumPage $aumPage
     */
    public function parse(IAumPage $aumPage){
        $this->dom->load($aumPage->getHtmlBody());

        $name = $this->dom->find('title');
        $name = preg_split("/\s/" , $name[0]->plaintext);
        $aumPage->setName($name[0]);

        $this->parseStats($aumPage);
        $this->parseAbout($aumPage);
    }

    /**
     * @param AumProfilePage $aumPage
     */
    private function parseStats(AumProfilePage $aumPage){
        $stats = $this->dom->find('td[class=viewPopu]');


       // set the counters
       // substr_replace used to remove =&nbsp
       $aumPage->setVisitsCounter(intval(str_replace(' ', '', $stats[0]->nextSibling()->plaintext)));
       $aumPage->setCharmsCounter(intval(str_replace(' ', '', $stats[1]->nextSibling()->plaintext)));
       $aumPage->setBasketsCounter(intval(str_replace(' ', '', $stats[2]->nextSibling()->plaintext)));
       $aumPage->setMailsCounter(intval(str_replace(' ', '', $stats[3]->nextSibling()->plaintext)));
       $aumPage->setBonus(intval(str_replace(' ', '', $stats[4]->nextSibling()->nextSibling()->plaintext)));


       // set the total values
       $aumPage->setVisitsPoints(intval(str_replace(' ', '', $stats[0]->nextSibling()->nextSibling()->plaintext)));
       $aumPage->setCharmsPoints(intval(str_replace(' ', '', $stats[1]->nextSibling()->nextSibling()->plaintext)));
       $aumPage->setBasketsPoints(intval(str_replace(' ', '', $stats[2]->nextSibling()->nextSibling()->plaintext)));
       $aumPage->setMailsPoints(intval(str_replace(' ', '', $stats[3]->nextSibling()->nextSibling()->plaintext)));

       
    }

    /**
     * @param AumProfilePage $aumPage
     */
    private function parseAbout(AumProfilePage $aumPage){
        $aboutText = $this->dom->find('div[id=about_div]');
        $aumPage->setAbout(trim($aboutText[0]->plaintext));
    }

}
?>
