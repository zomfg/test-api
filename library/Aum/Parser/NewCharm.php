<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewCharm
 *
 * @author dirk
 */
class Aum_Parser_NewCharm extends Aum_Parser_Abstract {

    public function __construct() {
        
    }

    public function parse(Aum_Page_Interface $aumPage) {
        $guys = simplexml_load_string($aumPage->getHtmlBody());

        foreach ($guys->albuminfo as $guy) {
            $thumb = $this->sanitize($guy->artLocation);
            $name = $this->sanitize($guy->artist, 1);
            $online = false;
            if (strstr($name, ' (online)')) {
                $online = true;
                $name = str_replace(' (online)', '', $name);
            }
            $cityAge = explode(',', $guy->albumName);
            $city = $this->sanitize($cityAge[0], 0);
            $age = $this->sanitize($cityAge[1], 0);
            $id = $this->sanitize($guy->id);

            //echo $cityAge .  '<br>';
            $aumPage->addGuy(new Aum_Model_MiniProfile($id, $name, $age, $city, $thumb, $online));
        }
    }
}
?>
