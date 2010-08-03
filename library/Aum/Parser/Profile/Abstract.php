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
abstract class Aum_Parser_Profile_Abstract extends Aum_Parser_Abstract{

    /**
     *
     * @param Aum_Page_Interface $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);
        
        $this->parseAbout($aumPage);
        $this->parseStats($aumPage);
        $this->parsePictures($aumPage);
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
            $likes[$i]->plaintext = utf8_encode($likes[$i]->plaintext);

            if(stristr($likes[$i]->plaintext, 'hobbies')){
                $aumPage->setHobbies($likes[++$i]);
            }


            else if(stristr($likes[$i]->plaintext, 'musique')){
                // parse music and cinema
                // start after 'Cinéma'
                for($j = 3 ; !stristr($likes[$i + $j]->plaintext, 'Livres') && $j + $i < count($likes) ; ++$j){
                    if($j % 2 == 1)
                        $aumPage->addSong ($likes[$i + $j]->plaintext);
                    else
                        $aumPage->addMovie($likes[$i + $j]->plaintext);
                }


            }
            else if(stristr($likes[$i]->plaintext, 'télé')){
                // parse books and tv
                // start after 'Télé'
                for($j = 2 ; $j + $i < count($likes) ; ++$j){
                    if($j % 2 == 0)
                        $aumPage->addBook($likes[$i + $j]->plaintext);
                    else
                        $aumPage->addTvShow($likes[$i + $j]->plaintext);
                }
            }
        }

    }


    /**
     *
     * @param AumProfilePage $aumPage 
     */
    private function parsePictures(Aum_Page_Profile_Abstract $aumPage){
        $photos = $this->dom->find('td[width=316] table tr td[width=250]');
        $aumPage->setMainPhotoThumb($photos[0]->background);
        
        $photos = $this->dom->find('td[width=316] table tr[height=66] td[width=66]');
        foreach($photos as $photo){
            $aumPage->addSecondaryPhotoThumb($photo->background);
        }
    }
    /**
    * @param AumProfilePage $aumPage
    */
    protected abstract function parseAbout(Aum_Page_Profile_Abstract $aumPage);
    protected abstract function parseStats(Aum_Page_Profile_Abstract $aumPage);
    protected abstract function parseDetails(simple_html_dom_node $details, Aum_Page_Profile_Abstract $aumPage);


}
?>
