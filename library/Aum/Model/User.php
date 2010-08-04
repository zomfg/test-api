<?php
/**
 * Description of AumUser
 *
 * @author johndoe
 */
class Aum_Model_User implements Aum_Model_Interface {
    /**
     * @var string
     */
    private $email      = null;

    /**
     * @var string
     */
    private $passHash   = null;

    /**
     * @var string
     */
    private $password   = null;

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
     * @param string $passHash MD5 password hash
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

    public function getPassHash() {
        return $this->passHash;
    }

    public function setPassHash($passHash) {
        $this->passHash = $passHash;
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

    public function __toString() {
        return $this->email;
    }

    public function toArray() {
        $data = array();
        return $data;
    }
}
?>
