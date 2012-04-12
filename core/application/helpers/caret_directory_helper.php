<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('caret_directory_map'))
{
	function caret_directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
	{
		if ($fp = @opendir($source_dir))
		{
			$filedata	= array();
			$new_depth	= $directory_depth - 1;
			$source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
			

			while (FALSE !== ($file = readdir($fp)))
			{
				$last_dir = str_replace("site/content/", "", $source_dir);
				// Remove '.', '..', and hidden files [optional]
				if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
				{
					continue;
				}

				if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
				{
					
					$filedata[$file] = caret_directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
				}
				else
				{
					$filedata[] = '<a href="admin/page/' . base64_encode($last_dir . $file) . '">' . $file . '</a>';
				}
			}

			closedir($fp);
			return $filedata;
		}

		return FALSE;
	}
}