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
     * @param IAumParser
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
}
?>
