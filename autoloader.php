<?php
function __autoload($name) {
    static $paths = array('client', 'page', 'parser', 'config', 'model', 'factory');
    foreach ($paths as $path) {
        if (file_exists(($classFile = 'library'.DIRECTORY_SEPARATOR.'Aum'.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$name.'.php')))
            include_once($classFile);
    }
}
?>