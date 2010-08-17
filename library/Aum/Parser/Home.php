<?php
/**
 * Description of Aum_Parser_Home
 *
 * @author dirk
 */
class Aum_Parser_Home extends Aum_Parser_Abstract {

    public function __construct() {
        
    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage) {
        //$this->dom->load($aumPage->getHtmlBody());
        parent::parse($aumPage);
        $this->parseNumbers($aumPage);
        $this->parseMiniatures($aumPage);
    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    private function parseNumbers(Aum_Page_Interface $aumPage) {
        if (($newMails = $this->dom->find('span[id=mailsCounter]', 0)))
            $aumPage->setNewMailsCounter($this->sanitize($newMails->plaintext));
        if (($newBaskets = $this->dom->find('span[id=flashsCounter]', 0)))
            $aumPage->setNewBasketsCounter($this->sanitize($newBaskets->plaintext));
        if (($newVisits = $this->dom->find('span[id=visitesCounter]', 0)))
            $aumPage->setNewVisitsCounter($this->sanitize($newVisits->plaintext));
        if (($baskets = $this->dom->find('big[id=basketCount]', 0)))
            $aumPage->setBasketsCounter($this->sanitize($baskets->plaintext));
        if (($popularity = $this->dom->find('big[id=popScore]', 0)))
            $aumPage->setPopularity($this->sanitize($popularity->plaintext));
    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    private function parseMiniatures(Aum_Page_Interface $aumPage) {
        
    }

}
?>
