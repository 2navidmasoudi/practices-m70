<?php

spl_autoload_register(function ($className) {
    include "class/" . str_replace("\\", "/", $className) . ".php";
});
