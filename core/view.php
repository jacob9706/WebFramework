<?php

require_once('template.php');

class View
{
	public function __construct($view_name, array $variables, $absolute_path=false)
	{
		// If we should format it, do so.
		if (!$absolute_path)
		{
			$file_name = $this->format_file($view_name);
		}
		else
		{
			$file_name = $view_name;
		}
		
		// Check if file exists.
		if (file_exists($file_name))
		{			
			foreach ($variables as $key => &$val)
			{
				$$key = $val;
			}
			
			require($file_name);
			return;
		}
		echo("Could not create view from: " . $file_name);
	}
	
	private function format_file($page)
	{
		return "app" . DIRECTORY_SEPARATOR . "views"
						. DIRECTORY_SEPARATOR . $page . '.php';
	}
}
