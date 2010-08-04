<?php

class IndexController extends Zend_Controller_Action {
    public function indexAction() {

                //test_profile_girl();
		echo '-------------------------------------<br/>';
		//test_profile_boy();
		//test_basket();
		
		//test_visits();
		//test_charms();
		//test_mails();
                test_xml();
    }
}


function test_xml(){
    $fact = new Aum_Factory_NewCharm();
    $page = $fact->createPage();
    $parser = $fact->createParser();
    $page->setHtmlBody(file_get_contents('/Users/dirk/Documents/AUM/API/test-api/basket.xml'));

    $page->parse($parser);

    
}


function test_charms(){
    $fact = new Aum_Factory_List();
    $page = $fact->createPage();
    $parser = $fact->createParser();
    $page->setHtmlBody(file_get_contents('/Users/dirk/Documents/AUM/API/test-api/test_charms_girl.html'));

    $page->parse($parser);
}

function test_mails(){
    $fact = new Aum_Factory_Mail();
    $page = $fact->createPage();
    $parser = $fact->createParser();
    $page->setHtmlBody(file_get_contents('/Users/dirk/Documents/AUM/API/test-api/test_mail.html'));

    $page->parse($parser);
}

function test_visits(){
    $fact = new Aum_Factory_List();
    $page = $fact->createPage();
    $parser = $fact->createParser();
    $page->setHtmlBody(file_get_contents('/Users/dirk/Documents/AUM/API/test-api/test_visits_boy.html'));

    $page->parse($parser);
}


function test_basket(){
    $fact = new Aum_Factory_Basket_Boy();
    $page = $fact->createPage();
    $parser = $fact->createParser();
    $page->setHtmlBody(file_get_contents('/Users/dirk/Documents/AUM/API/test-api/test_basket_boy.html'));

    $page->parse($parser);

    
}

function test_profile_girl(){
         $fact = new Aum_Factory_Profile_Girl();
        $page = $fact->createPage();
        $parser = $fact->createParser();
        $page->setHtmlBody(file_get_contents("/Users/dirk/Documents/AUM/API/test-api/test_profile_nana.html"));
        $page->Parse($parser);

        echo "Nom: " . $page->getName() . "<br/>";
        echo "quote: " . $page->getQuote() . "<br/>";
        echo "Visites: " . $page->getVisitsCounter() . " -> " . $page->getVisitsPoints() . "<br/>";
        echo "Mails: " . $page->getMailsCounter() . " -> " . $page->getMailsPoints() . "<br/>";
        echo "Charmes: " . $page->getCharmsCounter() . " -> " . $page->getCharmsPoints() . "<br/>";
        echo "Paniers: " . $page->getBasketsCounter() . " -> " . $page->getBasketsPoints() . "<br/>";
        echo "Bonus: " . $page->getBonus() . "<br/>";
        echo "Total: " . $page->getPopularity() . "<br/>";
        echo "About: " . $page->getAbout() . "<br/>";
        echo "age : " . $page->getAge() . "<br/>";
        echo "ville : " . $page->getLocation() . "<br/>";
        echo "yeux : " . $page->getEyes() . "<br/>";
        echo "cheveux : " . $page->getHair() . "<br/>";
        echo "mensurations : " . $page->getMeasurements() . "<br/>";
        echo "style : " . $page->getStyle() . "<br/>";
        echo "origines : " . $page->getOrigins() . "<br/>";
        echo "signes particuliers: " . $page->getSigns() . "<br/>";
        echo "profession: " . $page->getJob() . "<br/>";
        echo "alimentation : " . $page->getFood() . "<br/>";
        echo "alcool : " . $page->getAlcohol() . "<br/>";
        echo "tabac : " . $page->getSmoke() . "<br/>";
        echo "en dessous : " . $page->getUnder(). "<br/>";
        echo "émoustille : " . $page->getTitillate() . "<br/>";
        echo "au lit : " . $page->getInBed() . "<br/>";
        echo "accessoires : " . $page->getAccessories() . "<br/>";
        echo "craquer : " . $page->getCrispy() . "<br/>";
        echo "excite : " . $page->getExcites() . "<br/>";
        echo "déteste : " . $page->getHates() . "<br/>";
        echo "vices : " . $page->getVices() . "<br/>";
        echo "fantasmes : " . $page->getFantasies() . "<br/>";
        echo "atouts : " . $page->getAssets() . "<br/>";
        echo "elle est : " . $page->getQualifiers() . "<br/>";
        echo "hobbies : " . $page->getHobbies() . "<br/>";
        echo "main photo: " . $page->getMainPhotoThumb() . '<br/>';


        foreach($page->getSecondaryPhotoThumbs() as $val){
            echo 'small photo:: ' . $val . '<br/>';
        }
        foreach($page->getMovies() as $val){
            echo 'movie: ' . $val . '<br/>';
        }
        foreach($page->getMusic() as $val){
            echo 'music: ' . $val . '<br/>';
        }
        foreach($page->getTvShows() as $val){
            echo 'tv show: ' . $val . '<br/>';
        }
        foreach($page->getBooks() as $val){
            echo 'livre: ' . $val . '<br/>';
        }
}


function test_profile_boy(){
         $fact = new Aum_Factory_Profile_Boy();
        $page = $fact->createPage();
        $parser = $fact->createParser();
        $page->setHtmlBody(file_get_contents("/Users/dirk/Documents/AUM/API/test-api/test_profile_mec2.html"));
        $page->Parse($parser);

        echo "Nom: " . $page->getName() . "<br/>";
        echo "quote: " . $page->getQuote() . "<br/>";
        echo "Visites: " . $page->getVisitsCounter() . "<br/>";
        echo "Total: " . $page->getPopularity() . "<br/>";
        echo "About: " . $page->getAbout() . "<br/>";
        echo "age : " . $page->getAge() . "<br/>";
        echo "ville : " . $page->getLocation() . "<br/>";
        echo "relation voulue: " . $page->getWishedRelation() . '<br>';
        echo "socio: " . $page->getSocio() . '<br>';
        echo "yeux : " . $page->getEyes() . "<br/>";
        echo "cheveux : " . $page->getHair() . "<br/>";
        echo "mensurations : " . $page->getMeasurements() . "<br/>";
        echo "style : " . $page->getStyle() . "<br/>";
        echo "pilosité: " . $page->getPilosity() . '<br>';
        echo "origines : " . $page->getOrigins() . "<br/>";
        echo "profession: " . $page->getJob() . "<br/>";
        echo "alimentation : " . $page->getFood() . "<br/>";
        echo "alcool : " . $page->getAlcohol() . "<br/>";
        echo "tabac : " . $page->getSmoke() . "<br/>";
        echo "hobbies : " . $page->getHobbies() . "<br/>";
        echo "fonctions : " . $page->getFunction() . "<br/>";
        echo "habite dans : " . $page->getHousing() . "<br/>";
        echo "lit : " . $page->getBed() . "<br/>";
        echo "sdb : " . $page->getBathroom() . "<br/>";
        echo "audiovisuel : " . $page->getHifi() . "<br/>";
        echo "extra : " . $page->getExtra() . "<br/>";
        echo "animaux : " . $page->getPets() . "<br/>";
        echo "locomotion : " . $page->getLocomotion() . "<br/>";
        echo "main photo: " . $page->getMainPhotoThumb() . '<br/>';


        foreach($page->getSecondaryPhotoThumbs() as $val){
            echo 'small photo:: ' . $val . '<br/>';
        }

        foreach($page->getMovies() as $val){
            echo 'movie: ' . $val . '<br/>';
        }
        foreach($page->getMusic() as $val){
            echo 'music: ' . $val . '<br/>';
        }
        foreach($page->getTvShows() as $val){
            echo 'tv show: ' . $val . '<br/>';
        }
        foreach($page->getBooks() as $val){
            echo 'livre: ' . $val . '<br/>';
        }
}