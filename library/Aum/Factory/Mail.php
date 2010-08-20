<?php
/**
 * Description of Aum_Factory_Mail
 *
 * @author dirk
 */
class Aum_Factory_Mail extends Aum_Factory_Abstract {
    function __construct() {

    }

    /**
     * @return Aum_Page_Mail
     */
    public function createPage(){
        return new Aum_Page_Mail();
    }

    /**
     * @return Aum_Parser_Mail 
     */
    public function createParser(){
        return new Aum_Parser_Mail();
    }
}
?>
