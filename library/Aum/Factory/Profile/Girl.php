<?php
/**
 * Description of Aum_Factory_Profile_Girl
 *
 * @author dirk
 */
class Aum_Factory_Profile_Girl extends Aum_Factory_Abstract {
    /**
     * @var integer
     */
    private $aumId = 0;

    public function __construct($aumId) {
        $this->aumId = $aumId;
    }

    /**
     * @return Aum_Page_Profile_Girl
     */
    public function createPage(){
        return new Aum_Page_Profile_Girl($this->aumId);
    }

    /**
     * @return Aum_Parser_Profile_Girl
     */
    public function createParser(){
        return new Aum_Parser_Profile_Girl();
    }
}
?>
