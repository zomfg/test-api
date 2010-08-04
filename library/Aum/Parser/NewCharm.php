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
class Aum_Parser_NewCharm extends Aum_Parser_Abstract{
    public function __construct(){
        
    }

    public function  parse(Aum_Page_Interface $aumPage){

        $guys = simplexml_load_string($aumPage->getHtmlBody());

        foreach($guys->albuminfo as $guy){
            $thumb = $guy->artLocation;
            $name = $guy->artist;
            $cityAge = preg_split('[,]', $guy->albumName);
            $city = $cityAge[0];
            $age = $cityAge[1];
            $id = $guy->id;

            //echo $cityAge .  '<br>';
            $aumPage->addGuy(new Aum_Model_MiniProfile($name, $age, $city, $thumb, $id, false));
        }
    
    }
}
?>
