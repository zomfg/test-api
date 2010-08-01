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
    public function sendMessage($aumId, $message);
    public function addToFavorites($aumId);
    public function kickFromBasket($aumId);
    public function acceptCharm($aumId);
    public function refuseCharm($aumId);

    public function getActionUrl($aumActionName);
    /**
     * @param string $page
     * @return IAumPage
     */
    public function getPage($page);
}
?>
