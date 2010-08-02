<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumVisitParser
 *
 * @author dirk
 */
class AumListPageParser extends AumParser {
    public function __construct() {
        
    }

    public function parse(IAumPage $aumPage){
        parent::parse($aumPage);

        $visits = $this->dom->find('div[class=small]');
        //$visits = $visits->find('tr');
        
        foreach($visits as $visit){
            $name = $visit->find('div[class=small_pseudo]', 0)->plaintext;
            $city = $visit->find('div[class=small_city]', 0)->plaintext;
            $age = $visit->find('div[class=small_age]', 0)->plaintext;
            $picture = substr_replace(stristr($visit->find('div[class=small_picture]', 0)->style, 'http://'), '', -1);
            $online = $visit->find('div[class=small_picture_online]', 0) != null;
            $visitor = new AumMiniProfile($name, $age, $city, $picture, $online);
            
            $aumPage->addVisitor($visitor);
        }
        
    }
}
?>
