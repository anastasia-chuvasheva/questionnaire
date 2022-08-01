<?php

spl_autoload_register(function($className) {
//    echo $className . "<br>";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Question/Forum/' . $className . '.php';
});