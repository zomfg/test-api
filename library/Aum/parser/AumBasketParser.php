<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBasketParser
 *
 * @author dirk
 */
class AumBasketParser extends AumParser{
    
    public function __construct() {
        
    }

    /**
     * @param AumBasketPage $aumPage
     */
    public function parse(IAumPage $aumPage){
        parent::parse($aumPage);
        $visitors = array();
        $elems = $this->dom->find('td div div div');
 

        for($i = 0 ; $i < count($elems) ; ++$i){
            // only take 1/2
            if($i % 2 == 0){
                $visitor = $elems[$i];
                $thumb = $visitor->find('img', 0);
                $thumb = $thumb->src;

                $url = $visitor->find('a', 0);
                $name = $url->title;
                $url = $url->href;

                $ageAndCity = end(preg_split('[\-]', $visitor->find('div a', 0)->innertext));
                $ageAndCity = preg_split('[\<br\s\/\>]', $ageAndCity);

                $age = $ageAndCity[0];
                $city = $ageAndCity[1];

                $aumPage->addProduct($url, $name, $age, $city, $thumb);
                echo "\n\n\n\n\n\n\n";
            }
        }
    }
}
?>
