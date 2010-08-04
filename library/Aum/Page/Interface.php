<?php
/**
 *
 * @author johndoe
 */
interface Aum_Page_Interface {
    /**
     * @return string
     */
    public function getURL();

    /**
     * @param Aum_Parser_Interface
     */
    public function parse(Aum_Parser_Interface $parser);

    /**
     * @param string
     */
    public function setHtmlBody($htmlCode);

    /**
     * @return string
     */
    public function getHtmlBody();

    /**
     * @return array
     */
    public function toArray();
}
?>
