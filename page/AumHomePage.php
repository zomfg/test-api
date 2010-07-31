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

    private $newMailsCounter = 0;
    private $newVisitsCounter = 0;
    private $newBasketsCounter = 0;

    
    public function __construct() {
        parent::__construct();
    }


    public function getNewMailsCounter() {
        return $this->newMailsCounter;
    }

    public function getNewVisitsCounter() {
        return $this->newVisitsCounter;
    }

    public function getNewBasketsCounter() {
        return $this->newBasketsCounter;
    }

    public function setNewMailsCounter($newMailsCounter) {
        $this->newMailsCounter = $newMailsCounter;
    }

    public function setNewVisitsCounter($newVisitsCounter) {
        $this->newVisitsCounter = $newVisitsCounter;
    }

    public function setNewBasketsCounter($newBasketsCounter) {
        $this->newBasketsCounter = $newBasketsCounter;
    }
}
?>
