<?php

spl_autoload_register(function($className) {
    require dirname(dirname(__FILE__)) . '/' . str_replace("\\","/", $className).".php";
    echo $className.PHP_EOL;
});
