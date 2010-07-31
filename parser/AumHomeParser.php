<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumHomeParser
 *
 * @author dirk
 */
class AumHomeParser extends AumParser{
    function __construct() {
        parent::__construct();
    }

    public function Parse(IAumPage $aumPage){
        $this->dom->load($aumPage->getHtmlBody());


        $newMails = $this->dom->find('span[id=mailsCounter]');
        $newVisits = $this->dom->find('span[id=visitesCounter]');
        $newBaskets = $this->dom->find('span[id=flashsCounter]');

        if(count($newMails) > 0)
            $newMails = $newMails[0];
        else
            $newMails = 0;

        if(count($newVisits) > 0)
            $newVisits = $newVisits[0];
        else
            $newMails = 0;

        if(count($newBaskets) > 0)
            $newBaskets = $newBaskets[0];
        else
            $newBaskets = 0;

        $aumPage->setNewMailsCounter($newMails);
        $aumPage->setNewBasketsCounter($newBaskets);
        $aumPage->setNewVisitsCounter($newVisits);

    }

}
?>
