<?php
/**
 * Description of AbstractAumClient
 *
 * @author johndoe
 */
abstract class AbstractAumClient implements IAumClient {
    /**
     * @var AumUser
     */
    protected $user = null;

    /**
     * @param AumUser $user
     * @return boolean
     */
    public function connect(AumUser $user) {
        if (!($user instanceof AumUser))
            return false;
        $this->user = $user;
        return true;
    }

    public function disconnect() {
        unset($this->user);
    }
}
?>
