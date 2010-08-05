<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Profile_Abstract
 *
 * @author dirk
 */
class Aum_Parser_Profile_Girl extends Aum_Parser_Profile_Abstract{
    public function __construct() {

    }

    /**
     * @param Aum_Page_Interface $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);
    }

    /**
    * @param AumProfilePage $aumPage
    */
    protected function parseAbout(Aum_Page_Profile_Abstract $aumPage){
        $tmp = $this->dom->find('td[width=225] table td');
        $aumPage->setName($this->sanitize($tmp[0]->plaintext));
        $aumPage->setQuote($this->sanitize($tmp[2]->plaintext));

        $aboutText = $this->dom->find('div[id=about_div]');
        $aumPage->setAbout($this->sanitize($aboutText[0]->plaintext));

        $all = $this->dom->find('table[width=451]');

        $this->parseDetails($all[1], $aumPage);
        $this->parseLikes($all[2], $aumPage);
        $this->parseSexo($all[3], $aumPage);
        $this->parseCharacteristics($all[4], $aumPage);
    }
    /**
     * @param AumProfilePage $aumPage
     */
    protected function parseStats(Aum_Page_Profile_Abstract $aumPage){
        $stats = $this->dom->find('td[class=viewPopu]');

       // set the counters
       $aumPage->setVisitsCounter(intval(str_replace(' ', '', $stats[0]->nextSibling()->plaintext)));
       $aumPage->setCharmsCounter(intval(str_replace(' ', '', $stats[1]->nextSibling()->plaintext)));
       $aumPage->setBasketsCounter(intval(str_replace(' ', '', $stats[2]->nextSibling()->plaintext)));
       $aumPage->setMailsCounter(intval(str_replace(' ', '', $stats[3]->nextSibling()->plaintext)));
       $aumPage->setBonus(intval(str_replace(' ', '', $stats[4]->nextSibling()->nextSibling()->plaintext)));
    }

    /**
     * @param simple_html_dom_node $details
     * @param AumGirlProfilePage $aumPage
     */
    protected function parseDetails(simple_html_dom_node $details, Aum_Page_Profile_Abstract $aumPage){
        $details = $details->find('text');

        for($i = 0 ; $i < count($details) ; ++$i){
            $details[$i]->plaintext = $this->sanitize($details[$i]->plaintext);

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
    protected function parseLikes(simple_html_dom_node $likes, Aum_Page_Profile_Abstract $aumPage){
        $likes = $likes->find('text');
        /*
         * Hobbies
           aum

           Musique
           Cinéma

             un
             un
             deux
             deux
             trois
             trois


          Livres
          Télé

            un
            un
            deux
            deux
            trois
            trois
         */
        $music = array();
        $cinema = array();
        $books = array();
        $tv = array();

        for($i = 0 ; $i < count($likes) ; ++$i){
            $likes[$i]->plaintext = $this->sanitize($likes[$i]->plaintext);

            if(stristr($likes[$i]->plaintext, 'hobbies')){
                $aumPage->setHobbies($this->sanitize($likes[++$i]));
            }

            else if(stristr($likes[$i]->plaintext, 'musique')){
                // parse music and cinema
                // start after 'Cinéma'
                for($j = 3 ; !stristr($likes[$i + $j]->plaintext, 'Livres') && $j + $i < count($likes) ; ++$j){
                    if($j % 2 == 1)
                        $aumPage->addSong ($this->sanitize($likes[$i + $j]->plaintext));
                    else
                        $aumPage->addMovie($this->sanitize($likes[$i + $j]->plaintext));
                }
            }
            else if(stristr($likes[$i]->plaintext, 'télé')){
                // parse books and tv
                // start after 'Télé'
                for($j = 2 ; $j + $i < count($likes) ; ++$j){
                    if($j % 2 == 0)
                        $aumPage->addBook($this->sanitize($likes[$i + $j]->plaintext));
                    else
                        $aumPage->addTvShow($this->sanitize($likes[$i + $j]->plaintext));
                }
            }
        }
    }

    /**
     * @param simple_html_dom_node $sexo
     * @param AumGirlProfilePage $aumPage
     */
    protected function parseSexo(simple_html_dom_node $sexo, Aum_Page_Profile_Abstract $aumPage){
        $sexo = $sexo->find('text');

        for($i = 0 ; $i < count($sexo) ; ++$i){
            $sexo[$i]->plaintext = $this->sanitize($sexo[$i]->plaintext);

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
    protected function parseCharacteristics(simple_html_dom_node $chars, Aum_Page_Profile_Abstract $aumPage){
        $chars = $chars->find('text');

        for($i = 0 ; $i < count($chars) ; ++$i){
            $chars[$i]->plaintext = $this->sanitize($chars[$i]->plaintext);

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
