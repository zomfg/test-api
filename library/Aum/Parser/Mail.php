<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Parser_Mail
 *
 * @author dirk
 */
class Aum_Parser_Mail extends Aum_Parser_Abstract{

    public function __construct() {
        
    }

    /**
     * @param Aum_Page_Mail $aumPage
     */
    public function parse(Aum_Page_Interface $aumPage){
        parent::parse($aumPage);

        $mails = $this->dom->find('form[name=form] table tr[height=74]');

        //echo $mails;
        
        foreach($mails as $mail){
            $this->parseMail($aumPage, $mail);
        }
    }


    public function parseMail(Aum_Page_Mail $aumPage, simple_html_dom_node $mail){
        $url = $mail->find('td[class=a]', 1)->onclick;
        $pic = $mail->find('td[class=a] table tr td', 0)->style;
        $online = $mail->find('td[class=a] table img', 0) != null;
        $name = $mail->find('big', 0)->plaintext;

        $ageCity = preg_split('[\n]', $mail->find('td[class=a]', 2)->plaintext);
        $ageCity = preg_split('[,]', $ageCity[1]);
        $age = $ageCity[0];
        $city = '';
        // shit message d'aum
        if(count($ageCity) > 1)
            $city = $ageCity[1];

        $threadUrl = substr_replace(stristr($mail->find('td[class=a]', 3)->onclick, '/'), '', -1);
        $subjectTime = preg_split('[\n]', $mail->find('td[class=a]', 3)->plaintext);
        $subject = $subjectTime[0];
        $time = $subjectTime[1];
        
        $aumPage->addThread(new Aum_Model_MiniProfile($name, $age, $city, $pic, $url, null), $threadUrl, $subject, $time);
    }

}
?>
