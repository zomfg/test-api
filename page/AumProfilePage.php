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
class AumProfilePage extends AumPage {

    /**
     * @var integer
     */
    private $visitsCounter;
    /**
     * @var integer
     */
    private $charmsCounter;
    /**
     * @var integer
     */
    private $basketsCounter;
    /**
     * @var integer
     */
    private $mailsCounter;
    /**
     * @var integer
     */
    private $bonus;
    /**
     * @var integer
     */
    private $visitsPoints;
    /**
     * @var integer
     */
    private $charmsPoints;
    /**
     * @var integer
     */
    private $basketsPoints;
    /**
     * @var integer
     */
    private $mailsPoints;

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
        return $this->visitsPoints;
    }

    /**
     * @return integer
     */
    public function getCharmsPoints() {
        return $this->charmsPoints;
    }

    /**
     * @return integer
     */
    public function getBasketsPoints() {
        return $this->basketsPoints;
    }

    /**
     * @return integer
     */
    public function getMailsPoints() {
        return $this->mailsPoints;
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
     * @param integer $value
     */
    public function setVisitsPoints($value) {
        $this->visitsPoints = $value;
    }

    /**
     * @param integer $value
     */
    public function setCharmsPoints($value) {
        $this->charmsPoints = $value;
    }

    /**
     * @param integer $value
     */
    public function setBasketsPoints($value) {
        $this->basketsPoints = $value;
    }

    /**
     * @param integer $value
     */
    public function setMailsPoints($value) {
        $this->mailsPoints = $value;
    }

}
?>
