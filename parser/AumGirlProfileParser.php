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
       $aumPage->setVisitsCounter(intval(str_replace(' ', '', $stats[0]->nextSibling()->plaintext)));
       $aumPage->setCharmsCounter(intval(str_replace(' ', '', $stats[1]->nextSibling()->plaintext)));
       $aumPage->setBasketsCounter(intval(str_replace(' ', '', $stats[2]->nextSibling()->plaintext)));
       $aumPage->setMailsCounter(intval(str_replace(' ', '', $stats[3]->nextSibling()->plaintext)));
       $aumPage->setBonus(intval(str_replace(' ', '', $stats[4]->nextSibling()->nextSibling()->plaintext)));

       
    }

    /**
     * @param AumProfilePage $aumPage
     */
    private function parseAbout(AumProfilePage $aumPage){
        $aboutText = $this->dom->find('div[id=about_div]');
        $aumPage->setAbout(trim($aboutText[0]->plaintext));

        $all = $this->dom->find('table[width=451]');

        $this->parseDetails($all[1], $aumPage);
        $this->parseLikes($all[2], $aumPage);
        $this->parseSexo($all[3], $aumPage);
        $this->parseCharacteristics($all[4], $aumPage);
        /*
        echo $details;
        echo $likes;
        echo $sexo;
        echo $characteristics;*/

    }

    /**
     * @param simple_html_dom_node $details
     * @param AumGirlProfilePage $aumPage
     */
    private function parseDetails(simple_html_dom_node $details, AumGirlProfilePage $aumPage){
        $details = $details->find('text');

        for($i = 0 ; $i < count($details) ; ++$i){
            $details[$i]->plaintext = utf8_encode($details[$i]->plaintext);

            if(stristr($details[$i]->plaintext, 'age')){
                $aumPage->setAge($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'réside à')){
                $aumPage->setLocation($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'yeux')){
                $aumPage->setEyes($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'cheveux')){
                $aumPage->setHair($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'mensurations')){
                $aumPage->setMeasurements($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'style')){
                $aumPage->setStyle($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'origines')){
                $aumPage->setOrigins($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'signes particuliers')){
                $aumPage->setSigns($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'profession')){
                $aumPage->setJob($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'alimentation')){
                $aumPage->setFood($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'alcool')){
                $aumPage->setAlcohol($details[++$i]);
            }
            else if(stristr($details[$i]->plaintext, 'tabac')){
                $aumPage->setSmoke($details[++$i]);
            }
        }
    }

    /**
     * @param simple_html_dom_node $likes
     * @param AumGirlProfilePage $aumPage
     */
    private function parseLikes(simple_html_dom_node $likes, AumGirlProfilePage $aumPage){
        
    }

    /**
     * @param simple_html_dom_node $sexo
     * @param AumGirlProfilePage $aumPage
     */
    private function parseSexo(simple_html_dom_node $sexo, AumGirlProfilePage $aumPage){
        $sexo = $sexo->find('text');
        
        for($i = 0 ; $i < count($sexo) ; ++$i){
            $sexo[$i]->plaintext = utf8_encode($sexo[$i]->plaintext);

            if(stristr($sexo[$i]->plaintext, 'ce qui se cache en dessous')){
                $aumPage->setUnder($sexo[++$i]);
            }
            else if(stristr($sexo[$i]->plaintext, 'ce qui m\'émoustille')){
                $aumPage->setTitillate($sexo[++$i]);
            }
            else if(stristr($sexo[$i]->plaintext, 'au lit j\'aime')){
                $aumPage->setInBed($sexo[++$i]);
            }
            else if(stristr($sexo[$i]->plaintext, 'mes accessoires')){
                $aumPage->setAccessories($sexo[++$i]);
            }

        }

    }

    /**
     * @param simple_html_dom_node $chars
     * @param AumGirlProfilePage $aumPage
     */
    private function parseCharacteristics(simple_html_dom_node $chars, AumGirlProfilePage $aumPage){
        $chars = $chars->find('text');

        for($i = 0 ; $i < count($chars) ; ++$i){
            $chars[$i]->plaintext = utf8_encode($chars[$i]->plaintext);

            if(stristr($chars[$i]->plaintext, 'craquer')){
                $aumPage->setCrispy($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'excite')){
                $aumPage->setExcites($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'déteste')){
                $aumPage->setHates($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'vices')){
                $aumPage->setVices($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'fantasmes')){
                $aumPage->setFantasies($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'atouts')){
                $aumPage->setAssets($chars[++$i]);
            }
            else if(stristr($chars[$i]->plaintext, 'elle est')){
                $aumPage->setQualifiers($chars[++$i]);
            }



        }
    }

}
?>
