<?php
    
// require_once "core/App.php";
// require_once "core/Controller.php";
// require_once "core/Constant.php";

//! AUTOLOAD Core
spl_autoload_register(function( $class ){
    require_once __DIR__ . "/core/" . $class . ".php";  
});