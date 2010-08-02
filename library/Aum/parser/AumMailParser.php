<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumMailParser
 *
 * @author dirk
 */
class AumMailParser extends AumParser{

    public function __construct() {
        
    }

    /**
     * @param AumMailPage $aumPage
     */
    public function parse(IAumPage $aumPage){
        parent::parse($aumPage);

        $mails = $this->dom->find('form[name=form] table tr[height=74]');

        //echo $mails;
        
        foreach($mails as $mail){
            $this->parseMail($mail);
        }
    }


    public function parseMail(simple_html_dom_node $mail){
        $url = $mail->find('td[class=a]', 1)->onclick;
        $pic = $mail->find('td[class=a] table tr td', 0)->style;
        $online = $mail->find('td[class=a] table img', 0) != null;
        $name = $mail->find('big', 0)->plaintext;

        $ageCity = preg_split('[\n]', $mail->find('td[class=a]', 2)->plaintext);
        $ageCity = preg_split('[,]', $ageCity[1]);
        $age = $ageCity[0];
        // shit message d'aum
        if(count($ageCity) > 1)
            $city = $ageCity[1];

        $threadUrl = $mail->find('td[class=a]', 3)->onclick;
        $subjectTime = preg_split('[\n]', $mail->find('td[class=a]', 3)->plaintext);
        $subject = $subjectTime[0];
        $time = $subjectTime[1];

        //echo $mail;
        echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
    }

}
?>
