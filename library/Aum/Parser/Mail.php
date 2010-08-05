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
        if (is_array($mails))
            foreach($mails as $mail)
                $this->parseMail($aumPage, $mail);
    }


    public function parseMail(Aum_Page_Mail $aumPage, simple_html_dom_node $mail){
        $url = $mail->find('td[class=a]', 1)->onclick;
        $style = $mail->find('td[class=a] table tr td', 0)->style;
        $pic = null;
        if (preg_match('/url\((.+)\)/', $style, $matches))
            $pic =$this->sanitize($matches[1]);
        $online = $mail->find('td[class=a] table img', 0) != null;
        $name = $this->sanitize($mail->find('big', 0)->plaintext);

        $ageCity = preg_split('[\n]', $mail->find('td[class=a]', 2)->plaintext);
        $ageCity = preg_split('[,]', $ageCity[1]);
        $age = $this->sanitize($ageCity[0]);
        $city = '';
        // shit message d'aum
        if(count($ageCity) > 1)
            $city = $this->sanitize($ageCity[1]);

        $threadUrl = substr_replace(stristr($mail->find('td[class=a]', 3)->onclick, '/'), '', -1);
        $threadId = 0;
        if (preg_match('/fcc_suppr_(\d+)/', $mail->find('td[align=right]', 2)->find('input', 0)->id, $matches))
            $threadId = $this->sanitize($matches[1]);
        $aumId = 0;
        if (preg_match('/id=(\d+)/', $threadUrl, $matches))
            $aumId = $this->sanitize($matches[1]);
        $subjectTime = preg_split('[\n]', $mail->find('td[class=a]', 3)->plaintext);
        $preview = $this->sanitize($subjectTime[0]);
        $time = $this->sanitize($subjectTime[1]);

        $status = $this->sanitize($mail->find('td[class=a]', 4)->plaintext);

        $newMail = new Aum_Model_Mail(
                new Aum_Model_MiniProfile($aumId, $name, $age, $city, $pic, null),
                $threadId,
                $status,
                $preview,
                $time);
        $aumPage->addThread($newMail);
    }

}
?>
