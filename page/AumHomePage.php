<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumHomePage
 *
 * @author dirk
 */
class AumHomePage extends AumPage{
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
    
    public function __construct() {
        parent::__construct();
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



}
?>
