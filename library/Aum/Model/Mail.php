<?php
/**
 * Description of Mail
 *
 * @author Sergio
 */
class Aum_Model_Mail extends Aum_Abstract {
    /**
     * @var string lu|nouveau
     */
    private $status = null;

    /**
     * @var integer pour la suppression
     */
    private $id = 0;

    /**
     * @var Aum_Model_MiniProfile
     */
    private $contact = null;

    /**
     * @var string
     */
    private $preview = null;

    /**
     * @var string
     */
    private $time = null;

    function __construct($contact, $id, $status, $preview, $time) {
        $this->status = $status;
        $this->id = $id;
        $this->contact = $contact;
        $this->preview = $preview;
        $this->time = $time;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getContact() {
        return $this->contact;
    }

    public function setContact($contact) {
        $this->contact = $contact;
    }

    public function getPreview() {
        return $this->preview;
    }

    public function setPreview($preview) {
        $this->preview = $preview;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function  toArray() {
        return parent::filterArray(get_object_vars($this));
    }
}
?>
