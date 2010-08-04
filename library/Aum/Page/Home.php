<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Home
 *
 * @author dirk
 */
class Aum_Page_Home extends Aum_Page_Abstract{
    /**
     * @var integer
     */
    private $newMailsCounter = 0;
    /**
     * @var integer
     */
    private $newVisitsCounter = 0;
    /**
     * @var integer
     */
    private $newBasketsCounter = 0;
    /**
     * @var integer
     */
    private $basketsCounter = 0;
    /**
     * @var integer
     */
    private $popularity = 0;
    /**
     * @var Aum_Page_Profile_Abstract
     */
    private $lastVisitProfile;
    /**
     * @var Aum_Page_Profile_Abstract
     */
    private $lastBasketProfile;
    /**
     * @var Aum_Page_Profile_Abstract
     */
    private $lastMailProfile;

    public function __construct() {
        $this->configPageKey = 'home';
    }

    /**
     * @return integer
     */
    public function getNewMailsCounter() {
        return $this->newMailsCounter;
    }

    /**
     * @return integer
     */
    public function getNewVisitsCounter() {
        return $this->newVisitsCounter;
    }

    /**
     * @return integer
     */
    public function getNewBasketsCounter() {
        return $this->newBasketsCounter;
    }

    /**
     * @return integer
     */
    public function getBasketsCounter() {
        return $this->basketsCounter;
    }

    /**
     * @return integer
     */
    public function getPopularity() {
        return $this->popularity;
    }

    /**
     * @return Aum_Page_Profile_Abstract
     */
    public function getLastVisitProfile() {
        return $this->lastVisitProfile;
    }

    /**
     * @return Aum_Page_Profile_Abstract
     */
    public function getLastBasketProfile() {
        return $this->lastBasketProfile;
    }

    /**
     * @return Aum_Page_Profile_Abstract
     */
    public function getLastMailProfile() {
        return $this->lastMailProfile;
    }


    /**
     * @param integer $newMailsCounter
     */
    public function setNewMailsCounter($newMailsCounter) {
        $this->newMailsCounter = $newMailsCounter;
    }

    /**
     * @param integer $newVisitsCounter
     */
    public function setNewVisitsCounter($newVisitsCounter) {
        $this->newVisitsCounter = $newVisitsCounter;
    }

    /**
     * @param integer $newBasketsCounter
     */
    public function setNewBasketsCounter($newBasketsCounter) {
        $this->newBasketsCounter = $newBasketsCounter;
    }

    /**
     * @param integer $basketsCounter
     */
    public function setBasketsCounter($basketsCounter) {
        $this->basketsCounter = $basketsCounter;
    }

    /**
     * @param integer $popularity
     */
    public function setPopularity($popularity) {
        $this->popularity = $popularity;
    }

    /**
     * @param Aum_Page_Profile_Abstract  $lastVisitProfile
     */
    public function setLastVisitProfile(Aum_Page_Profile_Abstract $lastVisitProfile) {
        $this->lastVisitProfile = $lastVisitProfile;
    }

    /**
     * @param Aum_Page_Profile_Abstract $lastBasketProfile
     */
    public function setLastBasketProfile(Aum_Page_Profile_Abstract $lastBasketProfile) {
        $this->lastBasketProfile = $lastBasketProfile;
    }

    /**
     * @param Aum_Page_Profile_Abstract $lastCharmprofile
     */
    public function setLastMailProfile(Aum_Page_Profile_Abstract $lastMailProfile) {
        $this->lastMailProfile = $lastMailProfile;
    }

    /**
     * @return array
     */
    public function toArray() {
        $data = array();
        $data['popularity'] = $this->getPopularity();
        $data['counter']['visit'] = $this->getNewVisitsCounter();
        $data['counter']['mail'] = $this->getNewMailsCounter();
        $data['counter']['basket'] = $this->getNewBasketsCounter();
        return $data;
    }
}
?>
