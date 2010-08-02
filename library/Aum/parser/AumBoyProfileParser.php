<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyProfileParser
 *
 * @author dirk
 */
class AumBoyProfileParser extends AumProfileParser{
    public function __construct() {
        
    }
    /**
     *
     * @param IAumPage $aumPage 
     */
    public function parse(IAumPage $aumPage){
        parent::parse($aumPage);
    }

    /**
    * @param AumProfilePage $aumPage
    */
    protected function parseAbout(AumProfilePage $aumPage){
        $tmp = $this->dom->find('tr[height=142] table td');
        $aumPage->setName($tmp[0]->plaintext);
        $aumPage->setQuote($tmp[2]->plaintext);
        
        $aboutText = $this->dom->find('div[id=about_div]');
        $aumPage->setAbout(trim($aboutText[0]->plaintext));

        $all = $this->dom->find('table[width=452]');

        $this->parseDetails($all[0], $aumPage);
        $this->parseLikes($all[1], $aumPage);
        $this->parseAccessories($all[2], $aumPage);
    }

    /**
     * @param AumProfilePage $aumPage
     */
    protected function parseStats(AumProfilePage $aumPage){
        $stats = $this->dom->find('td[valign=top] span');
       // set the counters
       $aumPage->setPopularity($stats[6]->plaintext);
       $aumPage->setVisitsCounter($stats[7]->plaintext);
}

    /**
     * @param simple_html_dom_node $details
     * @param AumGirlProfilePage $aumPage
     */
    protected function parseDetails(simple_html_dom_node $details, AumProfilePage $aumPage){
        $details = $details->find('text');

        for($i = 0 ; $i < count($details) ; ++$i){
            $details[$i] = utf8_encode($details[$i]);


            if(stristr($details[$i], 'age')){
                $aumPage->setAge($details[++$i]);
            }
            else if(stristr($details[$i], 'réside à')){
                $aumPage->setLocation($details[++$i]);
            }
            else if(stristr($details[$i], 'yeux')){
                $aumPage->setEyes($details[++$i]);
            }
            else if(stristr($details[$i], 'cheveux')){
                $aumPage->setHair($details[++$i]);
            }
            else if(stristr($details[$i], 'mensurations')){
                $aumPage->setMeasurements($details[++$i]);
            }
            else if(stristr($details[$i], 'style')){
                $aumPage->setStyle($details[++$i]);
            }
            else if(stristr($details[$i], 'origines')){
                $aumPage->setOrigins($details[++$i]);
            }
            else if(stristr($details[$i], 'socio')){
                $aumPage->setSocio($details[++$i]);
            }
            else if(stristr($details[$i], 'pilosité')){
                $aumPage->setPilosity($details[++$i]);
            }
            else if(stristr($details[$i], 'relation souhaitée')){
                $aumPage->setWishedRelation($details[++$i]);
            }
            else if(stristr($details[$i], 'profession')){
                $aumPage->setJob($details[++$i]);
            }
            else if(stristr($details[$i], 'alimentation')){
                $aumPage->setFood($details[++$i]);
            }
            else if(stristr($details[$i], 'alcool')){
                $aumPage->setAlcohol($details[++$i]);
            }
            else if(stristr($details[$i], 'tabac')){
                $aumPage->setSmoke(utf8_encode($details[++$i]));
            }
        }
    }

    private function parseAccessories(simple_html_dom_node $acc, AumBoyProfilePage $aumPage){
        $acc = $acc->find('text');

        for($i = 0 ; $i < count($acc) ; ++$i){
            $acc[$i] = utf8_encode($acc[$i]);


            if(stristr($acc[$i], 'fonctions')){
                $aumPage->setFunction($acc[++$i]);
            }
            else if(stristr($acc[$i], 'habite')){
                $aumPage->setHousing($acc[++$i]);
            }
            else if(stristr($acc[$i], 'lit')){
                $aumPage->setBed($acc[++$i]);
            }
            else if(stristr($acc[$i], 'salle de bain')){
                $aumPage->setBathroom($acc[++$i]);
            }
            else if(stristr($acc[$i], 'audiovisuel')){
                $aumPage->setHifi($acc[++$i]);
            }
            else if(stristr($acc[$i], 'extra')){
                $aumPage->setExtra($acc[++$i]);
            }
            else if(stristr($acc[$i], 'animaux')){
                $aumPage->setPets($acc[++$i]);
            }
            else if(stristr($acc[$i], 'locomotion')){
                $aumPage->setLocomotion($acc[++$i]);
            }
        }
    }


}
?>
