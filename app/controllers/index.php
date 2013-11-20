<?php

class Index_Controller extends Controller
{
	private $vars = array();

	public function __construct()
	{
		$this->vars['html'] = $this->load_plugin('helper', 'html');
	}

	public function index()
	{
		$this->vars['page_name'] = 'Home';
		
		new View('index_view', $this->vars);
	}
}