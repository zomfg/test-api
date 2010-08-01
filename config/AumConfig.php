<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AumConfig
 *
 * @author dirk
 */
class AumConfig {
    /**
     * @var array
     */
    private $iniArray = null;

    /**
     * @var Aumconfig
     */
    private static $config = null;


    public function __construct(){
        $this->iniArray = parse_ini_file('config/config.ini', true);
    }
    
    /**
     * @return AumConfig
     */
    public static function Config(){
        if(self::$config == null)
            self::$config = new self();
        return self::$config;
    }

    /**
     * @param AumPage $aumPage
     * @return string
     */
    public function getUrl($aumPage){
        return $this->iniArray['pages'][get_class($aumPage)];
    }

    /**
     * @return integer
     */
    public function getCharmValue(){
        return $this->iniArray["values"]["charm"];
    }

    /**
     * @return integer
     */
    public function getVisitValue(){
        return $this->iniArray["values"]["visit"];
    }

    /**
     * @return integer
     */
    public function getMailValue(){
        return $this->iniArray["values"]["mail"];
    }

    /**
     * @return integer
     */
    public function getBasketValue(){
        return $this->iniArray["values"]["basket"];
    }

    /**
     * @param string $aumAction
     * @return string
     */
    public function getActionUrl($aumAction) {
        return $this->arrayConfig['actions'][$aumAction];
    }
}
?>
