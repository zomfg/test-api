<?php
/**
 *
 * @author johndoe
 */
interface IAumPage {
    public function getURL();
    public function Parse(IAumParser $parser);
}
?>
