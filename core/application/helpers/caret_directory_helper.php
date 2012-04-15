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
			 $CI =& get_instance();

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
					$current_page = $CI->cpage->parse($file);
					$filedata[] = '<a href="admin/page/' . base64_encode($last_dir . $file) . '">' . $file . '</a>';
				}
			}

			closedir($fp);
			return $filedata;
		}

		return FALSE;
	}
}

if ( ! function_exists('caret_site_map_ul'))
{
	function caret_site_map_ul($list, $attributes = '')
	{
		return _caret_list('ul', $list, $attributes);
	}
}

if ( ! function_exists('_caret_list'))
{
	function _caret_list($type = 'ul', $list, $attributes = '', $depth = 0)
	{
		// If an array wasn't submitted there's nothing to do...
		if ( ! is_array($list))
		{
			return $list;
		}

		// Set the indentation based on the depth
		$out = str_repeat(" ", $depth);

		// Were any attributes submitted?  If so generate a string
		if (is_array($attributes))
		{
			$atts = '';
			foreach ($attributes as $key => $val)
			{
				$atts .= ' ' . $key . '="' . $val . '"';
			}
			$attributes = $atts;
		}
		elseif (is_string($attributes) AND strlen($attributes) > 0)
		{
			$attributes = ' '. $attributes;
		}

		// Write the opening list tag
		$out .= "<".$type.$attributes.">\n";

		// Cycle through the list elements.  If an array is
		// encountered we will recursively call _list()

		static $_last_list_item = '';
		foreach ($list as $key => $val)
		{
			$_last_list_item = $key;

			$out .= str_repeat(" ", $depth + 2);
			$out .= "<li>";

			if ( ! is_array($val))
			{
				$out .= $val;
			}
			else
			{
				$out .= '<span>' . $_last_list_item."</span>\n";
				$out .= _list($type, $val, '', $depth + 4);
				$out .= str_repeat(" ", $depth + 2);
			}

			$out .= "</li>\n";
		}

		// Set the indentation for the closing tag
		$out .= str_repeat(" ", $depth);

		// Write the closing list tag
		$out .= "</".$type.">\n";

		return $out;
	}
}