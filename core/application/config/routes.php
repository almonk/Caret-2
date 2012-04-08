<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "page";

if ($this->config->item('admin_enabled')) {
	$route['admin'] = "admin";
	$route['admin/page/(:any)'] = "admin/page/$1";
	$route['admin/save/(:any)'] = "admin/save/$1";
}

$route[':any'] = "page";

$route['404_override'] = '';