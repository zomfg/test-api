<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumProfilePage
 *
 * @author dirk
 */
class AumGirlProfilePage extends AumProfilePage {

    /**
     * @var integer
     */
    private $visitsCounter = 0;
    /**
     * @var integer
     */
    private $charmsCounter = 0;
    /**
     * @var integer
     */
    private $basketsCounter = 0;
    /**
     * @var integer
     */
    private $mailsCounter = 0;
    /**
     * @var integer
     */
    private $bonus = 0;
    /**
     * @var string 
     */
    private $about = '';
    /**
     *
     * @var string
     */
    private $name = '';
    /**
     * @var string
     */
    private $age = '';
    /**
     * @var string
     */
    private $location = '';
    /**
     * @var string
     */
    private $eyes = '';
    /**
     * @var string
     */
    private $hair = '';
    /**
     * @var string
     */
    private $measurements = '';
    /**
     * @var string
     */
    private $style = '';
    /**
     * @var string
     */
    private $origins = '';
    /**
     * @var string
     */
    private $signs = '';
    /**
     * @var string
     */
    private $job = '';
    /**
     * @var string
     */
    private $food = '';
    /**
     * @var string
     */
    private $alcohol = '';
    /**
     * @var string
     */
    private $smoke = '';
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return integer
     */
    public function getVisitsCounter() {
        return $this->visitsCounter;
    }

    /**
     * @return integer
     */
    public function getCharmsCounter() {
        return $this->charmsCounter;
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
    public function getMailsCounter() {
        return $this->mailsCounter;
    }

    /**
     * @return integer
     */
    public function getBonus() {
        return $this->bonus;
    }

    /**
     * @return integer
     */
    public function getVisitsPoints() {
        return $this->getVisitsCounter() * AumConfig::Config()->getVisitValue();
    }

    /**
     * @return integer
     */
    public function getCharmsPoints() {
        return $this->getCharmsCounter() * AumConfig::Config()->getCharmValue();
    }

    /**
     * @return integer
     */
    public function getBasketsPoints() {
        return $this->getBaskEtsCounter() * AumConfig::Config()->getBasketValue();
    }

    /**
     * @return integer
     */
    public function getMailsPoints() {
        return $this->getMailsCounter() * AumConfig::Config()->getMailValue();
    }

    /**
     * @return integer
     */
    public function getPopularity() {
        return $this->getVisitsPoints()
             + $this->getMailsPoints()
             + $this->getBasketsPoints()
             + $this->getCharmsPoints()
             + $this->getBonus();
    }

    /**
     * @return string
     */
    public function getAbout() {
        return $this->about;
    }

    /**
     * @return string 
     */
    public function getName() {
        return $this->name;
    }
    /**
     * @return string
     */
    public function getAge() {
        return $this->age;
    }
    /**
     * @return string
     */
    public function getLocation() {
        return $this->location;
    }
    /**
     * @return string
     */
    public function getEyes() {
        return $this->eyes;
    }
    /**
     * @return string
     */
    public function getHair() {
        return $this->hair;
    }
    /**
     * @return string
     */
    public function getMeasurements() {
        return $this->measurements;
    }
    /**
     * @return string
     */
    public function getStyle() {
        return $this->style;
    }
    /**
     * @return string
     */
    public function getOrigins() {
        return $this->origins;
    }
    /**
     * @return string
     */
    public function getSigns() {
        return $this->signs;
    }
    /**
     * @return string
     */
    public function getJob() {
        return $this->job;
    }
    /**
     * @return string
     */
    public function getFood() {
        return $this->food;
    }
    /**
     * @return string
     */
    public function getAlcohol() {
        return $this->alcohol;
    }
    /**
     * @return string
     */
    public function getSmoke() {
        return $this->smoke;
    }



    /**
     * @param integer $value
     */
    public function setVisitsCounter($value) {
        $this->visitsCounter = $value;
    }

    /**
     * @param integer $value
     */
    public function setCharmsCounter($value) {
        $this->charmsCounter = $value;
    }

    /**
     * @param integer $value
     */
    public function setBasketsCounter($value) {
        $this->basketsCounter = $value;
    }

    /**
     * @param integer $value
     */
    public function setMailsCounter($value) {
        $this->mailsCounter = $value;
    }

    /**
     * @param integer $value
     */
    public function setBonus($value) {
        $this->bonus = $value;
    }

    /**
     * @param string $about 
     */
    public function setAbout($about) {
        $this->about = $about;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }
    /**
     * @param string $age
     */
    public function setAge($age) {
        $this->age = $age;
    }
    /**
     * @param string $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }
    /**
     * @param string $eyes
     */
    public function setEyes($eyes) {
        $this->eyes = $eyes;
    }
    /**
     * @param string $hair
     */
    public function setHair($hair) {
        $this->hair = $hair;
    }
    /**
     * @param string $measurements
     */
    public function setMeasurements($measurements) {
        $this->measurements = $measurements;
    }
    /**
     * @param string $style
     */
    public function setStyle($style) {
        $this->style = $style;
    }
    /**
     * @param string $origins
     */
    public function setOrigins($origins) {
        $this->origins = $origins;
    }
    /**
     * @param string $signs
     */
    public function setSigns($signs) {
        $this->signs = $signs;
    }
    /**
     * @param string $job
     */
    public function setJob($job) {
        $this->job = $job;
    }
    /**
     * @param string $food
     */
    public function setFood($food) {
        $this->food = $food;
    }
    /**
     * @param string $alcohol
     */
    public function setAlcohol($alcohol) {
        $this->alcohol = $alcohol;
    }
    /**
     * @param string $smoke
     */
    public function setSmoke($smoke) {
        $this->smoke = $smoke;
    }



}
?>
