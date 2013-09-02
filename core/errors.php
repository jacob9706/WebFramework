<?php

require_once("view.php");

class Error404
{
	public function __construct()
	{
		new View("core/error_templates/404.php", [], false, true);
	}
}

class ErrorLoadPlugin
{
	public function __construct($type, $what)
	{
		new View("core/error_templates/load_plugin.php", 
				 array("type" => $type,
					   "what" => $what), false, true);
	}
}
