<?php
/**
 *
 * @author johndoe
 */
interface IAumClient {
    /**
     * @param AumUser $user
     * @return boolean
     */
    public function connect(AumUser $user);
    public function disconnect();
    /**
     * @param string $page
     * @return IAumPage
     */
    public function getPage($page);
}
?>
