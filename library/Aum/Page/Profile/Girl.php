<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Profile_Abstract
 *
 * @author dirk
 */
class Aum_Page_Profile_Girl extends Aum_Page_Profile_Abstract {


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
    private $signs = '';

    /**
     * @var string
     */
    private $under = '';
    /**
     * @var string
     */
    private $titillate = '';
    /**
     * @var string
     */
    private $inBed = '';
    /**
     * @var string
     */
    private $accessories = '';
    /**
     * @var string
     */
    private $crispy = '';
    /**
     * @var string
     */
    private $excites = '';
    /**
     * @var string
     */
    private $hates = '';
    /**
     * @var string
     */
    private $vices = '';
    /**
     * @var string
     */
    private $fantasies = '';
    /**
     * @var string
     */
    private $assets = '';
    /**
     * @var string
     */
    private $qualifiers = '';

    
    public function __construct() {
        
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
        return $this->getVisitsCounter() * Aum_Config::Config()->getVisitValue();
    }

    /**
     * @return integer
     */
    public function getCharmsPoints() {
        return $this->getCharmsCounter() * Aum_Config::Config()->getCharmValue();
    }

    /**
     * @return integer
     */
    public function getBasketsPoints() {
        return $this->getBaskEtsCounter() * Aum_Config::Config()->getBasketValue();
    }

    /**
     * @return integer
     */
    public function getMailsPoints() {
        return $this->getMailsCounter() * Aum_Config::Config()->getMailValue();
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
    public function getSigns() {
        return $this->signs;
    }
    /**
     * @return string
     */
    /**
     * @return string
     */
    public function getUnder() {
        return $this->under;
    }
    /**
     * @return string
     */
    public function getTitillate() {
        return $this->titillate;
    }
    /**
     * @return string
     */
    public function getInBed() {
        return $this->inBed;
    }
    /**
     * @return string
     */
    public function getAccessories() {
        return $this->accessories;
    }

    /**
     * @return string
     */
    public function getCrispy() {
        return $this->crispy;
    }
    /**
     * @return string
     */
    public function getExcites() {
        return $this->excites;
    }
    /**
     * @return string
     */
    public function getHates() {
        return $this->hates;
    }
    /**
     * @return string
     */
    public function getVices() {
        return $this->vices;
    }
    /**
     * @return string
     */
    public function getFantasies() {
        return $this->fantasies;
    }
    /**
     * @return string
     */
    public function getAssets() {
        return $this->assets;
    }
    /**
     * @return string
     */
    public function getQualifiers() {
        return $this->qualifiers;
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

    public function setSigns($signs) {
        $this->signs = $signs;
    }

    public function setUnder($under) {
        $this->under = $under;
    }

    public function setTitillate($titillate) {
        $this->titillate = $titillate;
    }

    public function setInBed($inBed) {
        $this->inBed = $inBed;
    }

    public function setAccessories($accessories) {
        $this->accessories = $accessories;
    }

    public function setCrispy($crispy) {
        $this->crispy = $crispy;
    }

    public function setExcites($excites) {
        $this->excites = $excites;
    }

    public function setHates($hates) {
        $this->hates = $hates;
    }

    public function setVices($vices) {
        $this->vices = $vices;
    }

    public function setFantasies($fantasies) {
        $this->fantasies = $fantasies;
    }

    public function setAssets($assets) {
        $this->assets = $assets;
    }

    public function setQualifiers($qualifiers) {
        $this->qualifiers = $qualifiers;
    }
}
?>
