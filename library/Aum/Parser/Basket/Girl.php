<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Basket_Girl
 *
 * @author dirk
 */
class Aum_Parser_Basket_Girl extends Aum_Parser_Abstract{
    
    public function __construct() {
        
    }

    /**
     * @param AumBasketPage $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);

        $this->parseProducts($aumPage);
        $this->parseContacts($aumPage);

    }

    private function parseProducts(Aum_Page_Interface $aumPage){
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

    private function parseContacts(Aum_Page_Interface $aumPage){
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
        $thumb = $this->sanitize($thumb->src);

        $url = $visitor->find('a', 0);
        $name = $this->sanitize($url->title);
        $url = $this->sanitize($url->href);
        $aumId = 0;
        if (preg_match('/get(in|out)=(\d+)/', $visitor->find('a', 2)->href, $matches))
            $aumId = $this->sanitize ($matches[2]);
        $ageAndCity = preg_split('[-]', $visitor->find('div a', 0)->innertext);
        $ageAndCity = $ageAndCity[1];
        $ageAndCity = preg_split('[\<br\s\/\>]', $ageAndCity);

        $age = $this->sanitize($ageAndCity[0]);
        $city = $this->sanitize($ageAndCity[1]);
        $online = $visitor->find('comment', 0) != null;
        
        return new Aum_Model_MiniProfile($aumId, $name, $age, $city, $thumb, $online);
        
    }
}
?>
