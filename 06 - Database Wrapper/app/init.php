<?php

require_once __DIR__ . "/config/config.php";

//! AUTOLOAD Core
spl_autoload_register(function( $class ){
    require_once __DIR__ . "/core/" . $class . ".php";  
});