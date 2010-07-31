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
    /*
     * @var array
     */
    private $arrayConfig = null;

    /*
     * @var Aumconfig
     */
    private static $config = null;


    public function __construct(){
        $this->arrayConfig = parse_ini_file("/Users/dirk/Documents/AUM/API/test-api/config/config.ini");
    }
    
    /*
     * @return AumConfig
     */
    public static function Config(){
        if(AumConfig::$config == null){
            AumConfig::$config = new AumConfig();
        }

        return AumConfig::$config;
    }

    /*
     * @param AumPage $aumPage
     * return string
     */
    public function getUrl($aumPage){
        return $this->arrayConfig[get_class($aumPage)];
    }
    

}
?>
