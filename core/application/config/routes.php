<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "page";

if ($this->config->item('admin_enabled')) {
	$route['admin'] = "admin/index";
	$route['admin/login'] = "admin/login";
	$route['admin/do_login'] = "admin/do_login";
	$route['admin/logout'] = "admin/logout";
	$route['admin/assets'] = "admin/assets";
	$route['admin/asset/upload'] = "admin/upload_asset";
	$route['admin/page/(:any)'] = "admin/page/$1";
	$route['admin/templates']	= "admin/templates";
	$route['admin/template/(:any)']	= "admin/template/$1";
	$route['admin/save/(:any)'] = "admin/save/$1";
	$route['admin/save_template/(:any)']	= "admin/save_template/$1";
}

$route[':any'] = "page";

$route['404_override'] = '';