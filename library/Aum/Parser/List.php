<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_List
 *
 * @author dirk
 */
class Aum_Parser_List extends Aum_Parser_Abstract {
    public function __construct() {
        
    }

    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);

        $visits = $this->dom->find('div[class=small]');
        //$visits = $visits->find('tr');
        
        foreach($visits as $visit){
            if($visit->find('div[class=small_noone1]', 0) == null) {
                //$url = substr_replace(stristr($visit->onclick, '/'), '', -1);
                $visitId = explode('_', $visit->id);
                $aumId = $this->sanitize($visitId[0]);
                $name = $this->sanitize($visit->find('div[class=small_pseudo]', 0)->plaintext);
                $city = $this->sanitize($visit->find('div[class=small_city]', 0)->plaintext);
                $age = $this->sanitize($visit->find('div[class=small_age]', 0)->plaintext);
                $picture = $this->sanitize(substr_replace(stristr($visit->find('div[class=small_picture]', 0)->style, 'http://'), '', -1));
                $online = $visit->find('div[class=small_picture_online]', 0) != null;
                $visitor = new Aum_Model_MiniProfile($aumId, $name, $age, $city, $picture, $online);

                $aumPage->addVisitor($visitor);
            }
        }
        
    }
}
?>
