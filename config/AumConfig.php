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
    private $arrayConfig = null;

    /**
     * @var Aumconfig
     */
    private static $config = null;


    public function __construct(){
        $this->arrayConfig = parse_ini_file('config/config.ini', true);
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
        return $this->arrayConfig['pages'][get_class($aumPage)];
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
