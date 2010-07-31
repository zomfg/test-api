<?php
function __autoload($name) {
    static $paths = array('client', 'page', 'parser', 'config');
    foreach ($paths as $path) {
        if (file_exists(($classFile = $path.DIRECTORY_SEPARATOR.$name.'.php')))
            include_once($classFile);
    }
}

    $aumpage = new AumMailPage;
    echo $aumpage->getURL() ."<br/>";
    $aumpage = new AumBasketPage;
    echo $aumpage->getURL() ."<br/>";
    $aumpage = new AumCharmPage;
    echo $aumpage->getURL() ."<br/>";
    $aumpage = new AumVisitPage;
    echo $aumpage->getURL() ."<br/>";
    $aumpage = new AumChatPage;
    echo $aumpage->getURL() ."<br/>";

?>
