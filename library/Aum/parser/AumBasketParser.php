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


        $this->parseProducts($aumPage);
        $this->parseContacts($aumPage);

    }

    private function parseProducts(AumBasketPage $aumPage){
        $elems = $this->dom->find('table[id=tabO_1] tr td div div');
        foreach($elems as $elem){
            //echo $elem;
        }
        
        for($i = 0 ; $i < count($elems) ; ++$i){
            // only take 1/2
            if($i % 2 == 0){
                $product = $this->parseVisitor($elems[$i]);
                $aumPage->addProduct($product);
            }
        }
    }

    private function parseContacts(AumBasketPage $aumPage){
        $elems = $this->dom->find('table[id=tabO_2] tr td div div');

        for($i = 0 ; $i < count($elems) ; ++$i){
            // only take 1/2
            if($i % 2 == 0){
                $contact = $this->parseVisitor($elems[$i]);
                $aumPage->addContact($contact);
            }
        }
    }

    private function parseVisitor(simple_html_dom_node $visitor){
        $thumb = $visitor->find('img', 0);
        $thumb = $thumb->src;

        $url = $visitor->find('a', 0);
        $name = $url->title;
        $url = $url->href;

        $ageAndCity = preg_split('[-]', $visitor->find('div a', 0)->innertext);
        $ageAndCity = $ageAndCity[1];
        $ageAndCity = preg_split('[\<br\s\/\>]', $ageAndCity);

        $age = $ageAndCity[0];
        $city = $ageAndCity[1];
        $online = $visitor->find('comment', 0) != null;

        return new AumMiniProfile($name, $age, $city, $thumb, $url, $online);
        
    }
}
?>
