<?php
/**
 * Description of AumConfig
 *
 * @author dirk
 */
class Aum_Config {
    /**
     * @staticvar Zend_Config $config
     * @return Zend_Config
     */
    public static function get() {
        static $config = null;
        if ($config == null) {
            $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/api.ini', APPLICATION_ENV);
            $config->setReadOnly();
        }
        return $config;
    }
}
?>
