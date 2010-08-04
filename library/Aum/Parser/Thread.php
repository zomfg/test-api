<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Thread
 *
 * @author dirk
 */
class Aum_Parser_Thread extends Aum_Parser_Abstract{
    function __construct() {

    }

    public function parse(Aum_Page_Interface $aumPage) {
        parent::parse($aumPage);

        $messages = $this->dom->find('tr table[width=100%] td p');

        $id = $this->dom->find('div[class=mini]', 0)->id;
        $id = preg_split('[_]', $id);
        $aumPage->setContact($id[0]);
        
        for($i = 0 ; $i < count($messages) ; $i++){
            $time = $messages[$i]->plaintext;
            $msg = $messages[++$i]->innertext;
            $aumPage->addMessage($time, $msg);
        }
    }

}
?>
