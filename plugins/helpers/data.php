<?php

class Data_Helper
{
	public function __construct()
	{
		ini_set('auto_detect_line_endings',true);
	}
	
	public function load_data($file_location)
	{
		$result = array();
		if(file_exists($file_location)) {
			$file = fopen($file_location,'r');
			$resulting_string = "";
			$section = '';
			while(!feof($file))
			{
				$line = trim(fgets($file));
				if (strlen($line) > 0)
				{
					$first_char = $line[0];
					if ($first_char != '#' && $first_char != ':')
					{
						$resulting_string .= $line . ' ';
					}
					elseif ($first_char == ':')
					{
						if ($section != '')
						{
							$result[$section] = $resulting_string;
							$resulting_string = "";
						}
						$section = substr($line, 1, strlen($line) - 1);
					}
				}
			}
			if ($section != '')
			{
				$result[$section] = $resulting_string;
			}
			fclose($file);
		}
		
		return $result;
	}
}
