<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumProfile
 *
 * @author dirk
 */
class AumProfile {
    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var boolean
     */
    private $online;

    /**
     *
     * @var string
     */
    private $pictureUrl;

    /**
     * @var string
     */
    private $city;

    /**
     * @var integer
     */
    private $age;
    function __construct() {

    }

    
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function getOnline() {
        return $this->online;
    }

    /**
     * @return string
     */
    public function getPictureUrl() {
        return $this->pictureUrl;
    }

    /**
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @return integer
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @param boolean $online
     */
    public function setOnline($online) {
        $this->online = $online;
    }

    /**
     * @param string $pictureUrl
     */
    public function setPictureUrl($pictureUrl) {
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * @param string $city 
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @param integer $age
     */
    public function setAge($age) {
        $this->age = $age;
    }



}
?>
