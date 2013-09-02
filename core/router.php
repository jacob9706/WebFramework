<?php

/**
 * Router is used to route the application based on the 
 * page and subpage GET variables from the url. This 
 * simplifies and speeds things up compared to trying
 * to parse an elaborate url scheme.
 * 
 * If pretty url's are required use a mod-rewrite rule.
 */
class Router
{
	/**
	 * Constructor for the Router. Just grabs the page/
	 * subpage from the url. If they are not present
	 * it defaults to index for both of them.
	 */
	public function __construct()
	{
		// The page is the controller and the subpage
		// is the method.
		$this->page = isset($_GET['page']) ? $_GET['page'] : 'index';
		$this->subpage = isset($_GET['subpage']) ? $_GET['subpage'] : 'index';
	}
	
	/**
	 * Route the application.
	 */
	public function route()
	{
		$file_name = $this->format_file($this->page);
	
		// Check if file exists.
		if (file_exists($file_name))
		{
			// Include the file and check if the class
			// exists.
			require_once($file_name);
			$class_name = $this->format_class_name($this->page);
			if (class_exists($class_name))
			{
				// Instatiate object and check if it has
				// the method.
				$controller = new $class_name();

				if (method_exists($controller, $this->subpage))
				{
					// Call the method and return
					$controller->{$this->subpage}();
					return;
				}
			}
		}
		// TODO: Throw error for any of the failed cases above.
		new Error404();
		die();
	}
	
	/**
	 * The file names are just what will show in the url. ie. home_page.php
	 */
	private function format_file($page)
	{
		return "app" . DIRECTORY_SEPARATOR . "controllers"
						. DIRECTORY_SEPARATOR . $page . '.php';
	}
	
	/**
	 * Controller classes will be formated as ClassName_Controller.
	 */
	private function format_class_name($page)
	{
		// Divide up the '-' and uppercase each word.
		$parts = explode("_", $page);
		$result = "";
		foreach ($parts as $part)
		{
			$result .= ucfirst($part);
		}
		// Add a '_Controller' to the result and return it.
		return $result . "_Controller";
	}
}
