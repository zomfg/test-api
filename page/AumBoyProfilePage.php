<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumBoyProfilePage
 *
 * @author dirk
 */
class AumBoyProfilePage extends AumProfilePage{
    private $popularity = 0;
    private $wishedRelation = '';
    private $pilosity = '';
    private $socio = '';
    private $function = '';
    private $housing = '';
    private $bed = '';
    private $bathroom = '';
    private $hifi = '';
    private $extra = '';
    private $pets = '';
    private $locomotion = '';
    
    public function __construct(){
        parent::__construct();
    }

    public function getPopularity() {
        return $this->popularity;
    }
    public function getWishedRelation() {
        return $this->wishedRelation;
    }

    public function getPilosity() {
        return $this->pilosity;
    }

    public function getSocio() {
        return $this->socio;
    }

    public function getFunction() {
        return $this->function;
    }

    public function getHousing() {
        return $this->housing;
    }

    public function getBed() {
        return $this->bed;
    }

    public function getBathroom() {
        return $this->bathroom;
    }

    public function getHifi() {
        return $this->hifi;
    }

    public function getExtra() {
        return $this->extra;
    }

    public function getPets() {
        return $this->pets;
    }

    public function getLocomotion() {
        return $this->locomotion;
    }

    
    public function setPopularity($popularity) {
        $this->popularity = $popularity;
    }
    public function setWishedRelation($wishedRelation) {
        $this->wishedRelation = $wishedRelation;
    }

    public function setPilosity($pilosity) {
        $this->pilosity = $pilosity;
    }

    public function setSocio($socio) {
        $this->socio = $socio;
    }

    public function setFunction($function) {
        $this->function = $function;
    }

    public function setHousing($housing) {
        $this->housing = $housing;
    }

    public function setBed($bed) {
        $this->bed = $bed;
    }

    public function setBathroom($bathroom) {
        $this->bathroom = $bathroom;
    }

    public function setHifi($hifi) {
        $this->hifi = $hifi;
    }

    public function setExtra($extra) {
        $this->extra = $extra;
    }

    public function setPets($pets) {
        $this->pets = $pets;
    }

    public function setLocomotion($locomotion) {
        $this->locomotion = $locomotion;
    }



}
?>
