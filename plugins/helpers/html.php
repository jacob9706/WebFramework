<?php

class Html_Helper
{
	public function a($page, $subpage, $text, $extras="")
	{
		$page = urlencode($page);
		$subpage = urlencode($subpage);
		return "<a href='index.php?page={$page}&subpage={$subpage}' {$extras}>{$text}</a>";
	}
	
	public function page_path($page, $subpage)
	{
		return "index.php?page={$page}&subpage={$subpage}";
	}
	
	public function content_path($path)
	{
		return 'app/content/' . $path;
	}
}
