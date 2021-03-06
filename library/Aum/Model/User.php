<?php
/**
 * Description of AumUser
 *
 * @author johndoe
 */
class Aum_Model_User extends Aum_Abstract {
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;
    const SEX_UNKNOWN = 3;

    /**
     * @var string
     */
    private $aumId      = '';
    /**
     * @var string
     */
    private $email      = '';

    /**
     * @var string
     */
    private $password   = '';

    /**
     * @var integer
     */
    private $numberVisits   = 0;
    /**
     * @var integer
     */
    private $numberMessages = 0;
    /**
     * @var integer
     */
    private $numberCharmes  = 0;
    /**
     * @var integer
     */
    private $numberPaniers  = 0;

    /**
     * @param string $email
     * @param string $password
     */
    function __construct($email = null, $password = null) {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNumberVisits() {
        return $this->numberVisits;
    }

    public function setNumberVisits($numberVisits) {
        $this->numberVisits = $numberVisits;
    }

    public function getNumberMessages() {
        return $this->numberMessages;
    }

    public function setNumberMessages($numberMessages) {
        $this->numberMessages = $numberMessages;
    }

    public function getNumberCharmes() {
        return $this->numberCharmes;
    }

    public function setNumberCharmes($numberCharmes) {
        $this->numberCharmes = $numberCharmes;
    }

    public function getNumberPaniers() {
        return $this->numberPaniers;
    }

    public function setNumberPaniers($numberPaniers) {
        $this->numberPaniers = $numberPaniers;
    }

    public function getId() {
        return $this->aumId;
    }

    public function setId($id) {
        $this->aumId = $id;
    }

    public function isLoggedIn() {
        return ($this->aumId > 0);
    }

    public static function getSex($aumId) {
        if (preg_match('/2[0-9]+/', $aumId))
            return self::SEX_MALE;
        if (preg_match('/1[0-9]+/', $aumId))
            return self::SEX_FEMALE;
        return self::SEX_UNKNOWN;
    }

    public function canInteractWith($aumId) {
        if (($targetSex = self::getSex($aumId)) == self::SEX_UNKNOWN)
            return false;
        if (($sourceSex = self::getSex($this->aumId)) == self::SEX_UNKNOWN)
            return false;
        return ($targetSex != $sourceSex);
    }

    public function __toString() {
        return $this->email;
    }

    public function toArray() {
        return parent::filterArray(get_object_vars($this), array('password'));
    }
}
?>
