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
        if(AumConfig::$config == null){
            AumConfig::$config = new AumConfig();
        }

        return AumConfig::$config;
    }

    /**
     * @param AumPage $aumPage
     * @return string
     */
    public function getUrl($aumPage){
        return $this->arrayConfig['pages'][get_class($aumPage)];
    }
    

}
?>
