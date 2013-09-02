<?php

// Require the core router and view handler
require_once("core" . DIRECTORY_SEPARATOR . "errors.php");
require_once("core" . DIRECTORY_SEPARATOR . "router.php");
require_once("core" . DIRECTORY_SEPARATOR . "view.php");
require_once("core" . DIRECTORY_SEPARATOR . "base.php");

// Instantiate a router and route. 
$router = new Router();
$router->route();

// Yes, it really is that simple.
