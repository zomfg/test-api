<?php
/**
 *
 * @author johndoe
 */
interface IAumPage {
    /**
     * @return string
     */
    public function getURL();

    /**
     * @param IAumParser
     */
    public function parse(IAumParser $parser);

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
