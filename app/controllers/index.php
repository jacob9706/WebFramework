<?php

class Index_Controller extends Controller
{
	public function __construct()
	{
		$this->load_plugin('helper', 'html');
	}
	
	public function index()
	{
		new View('tpl', array("test" => 1,
							  "html" => $this->plugins['html']
							 )
		);
	}
	
	public function about()
	{
		phpinfo();
	}
}
