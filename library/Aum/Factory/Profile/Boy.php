<?php
/**
 * Description of Aum_Factory_Profile_Boy
 *
 * @author dirk
 */
class Aum_Factory_Profile_Boy extends Aum_Factory_Abstract {
    /**
     * @var integer
     */
    private $aumId = 0;

    public function __construct($aumId) {
        $this->aumId = $aumId;
    }

    /**
     * @return Aum_Page_Profile_Boy
     */
    public function createPage(){
        return new Aum_Page_Profile_Boy($this->aumId);
    }

    /**
     * @return Aum_Parser_Profile_Boy
     */
    public function createParser(){
        return new Aum_Parser_Profile_Boy();
    }
}
?>
