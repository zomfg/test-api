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
    public function init(AumUser $user);
    public function login();
    public function logout();
    /**
     * @param string $page
     * @return IAumPage
     */
    public function getPage($page);
}
?>
