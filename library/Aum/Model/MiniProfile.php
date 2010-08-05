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
class Aum_Model_MiniProfile extends Aum_Abstract {
    /**
     * @var integer
     */
    private $aumId = 0;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var boolean
     */
    private $online = false;

    /**
     * @var string
     */
    private $pictureUrl = '';

    /**
     * @var string
     */
    private $city = '';

    /**
     * @var integer
     */
    private $age = 0;

    /**
     * @param integer $aumId
     * @param string $name
     * @param integer $age
     * @param string $city
     * @param string $pictureUrl
     * @param boolean $online
     */
    public function __construct($aumId, $name, $age, $city, $pictureUrl, $online) {
        $this->setAumId($aumId);
        $this->setAge($age);
        $this->setName($name);
        $this->setCity($city);
        $this->setPictureUrl($pictureUrl);
        $this->setOnline($online);
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

    public function getAumId() {
        return $this->aumId;
    }

    public function setAumId($aumId) {
        $this->aumId = $aumId;
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
