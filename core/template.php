<?php

class Template
{
	private $vars = array();
	
	public function assign($key, $value)
	{
		$this->vars[$key] = $value;
	}
	
	public function render($template_name)
	{		
		if (file_exists($template_name))
		{
			$content = file_get_contents($template_name);
			
			foreach ($this->vars as $key => $value)
			{
				if (is_object($value))
					continue;
				else
					$content = '<?php $' . $key . ' = "' . $value . '"; ?> ' . $content;
				$content = preg_replace('/\{\{' . $key . '\}\}/', $value, $content);
			}
			
			preg_match_all('/href\=\"(.*)\"/', $content, $matches);
			
			$content = preg_replace('/\<\!\-\- if (.*) \-\-\>/', '<?php if ($1) : ?>', $content);
			$content = preg_replace('/\<\!\-\- elseif (.*) \-\-\>/', '<?php elseif ($1) : ?>', $content);
			$content = preg_replace('/\<\!\-\- else \-\-\>/', '<?php else : ?>', $content);
			$content = preg_replace('/\<\!\-\- endif \-\-\>/', '<?php endif; ?>', $content);

			foreach ($matches[1] as $match)
			{
				if (strpos($match, 'http') !== false)
				{
					$new_url = $this->format_url($match);
					
					$content = str_replace($match, $new_url, $content);
				}
				elseif (strpos($match, 'content') !== false)
				{
					$new_url = $this->format_link($match);
					$content = str_replace($match, $new_url, $content);
				}
			}
			
			eval(' ?>' . $content . '<?php ');
		}
	}
	
	private function format_url($info)
	{
		$out = '';
		$e = explode('/', $info, 2);
		$page = isset($e[0]) ? $e[0] : 'index';
		$sub_page = isset($e[1]) ? $e[1] : 'index';
		return '?page=' . urlencode($page) . '&subpage=' . urlencode($sub_page);
	}
	
	private function format_link($info)
	{
		
	}
}
