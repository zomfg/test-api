<?php
/**
 *
 * @author johndoe
 */
interface IAumPage {
    public function getURL();
    public function Parse(IAumParser $parser);
    public function setHtmlBody($htmlCode);
    public function getHtmlBody();
}
?>
