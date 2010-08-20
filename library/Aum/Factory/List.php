<?php
/**
 * Description of Aum_Factory_List
 *
 * @author dirk
 */
class Aum_Factory_List extends Aum_Factory_Abstract {
    private $configPageKey = null;

    public function __construct($configPageKey = 'visit') {
        $this->configPageKey = $configPageKey;
    }

    /**
     * @return Aum_Page_List
     */
    public function createPage(){
        return new Aum_Page_List($this->configPageKey);
    }

    /**
     * @return Aum_Parser_List
     */
    public function createParser(){
        return new Aum_Parser_List();
    }
}
?>
