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
            $cityAge = $guy->albumName;
            $id = $guy->id;

            echo $thumb. ' '. $name . ' ' . $cityAge . ' '. $id . '<br>';
        }
    
    }
}
?>
