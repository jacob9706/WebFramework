<?php

class Base
{
	public $plugins = array();
	
	public function load_plugin($type, $what)
	{
		$require_path = "plugins" . DIRECTORY_SEPARATOR . $type . "s" .
						DIRECTORY_SEPARATOR . $what . ".php";
		$class_name = ucfirst($what) . '_' . ucfirst($type);
		
		@include_once($require_path);
		
		if (!class_exists($class_name))
		{
			new ErrorLoadPlugin($type, $what);
			return;
		}
		
		$this->plugins[$what] = new $class_name();
	}
}

class Controller extends Base
{
	
}

class Model extends Base
{
	
}
