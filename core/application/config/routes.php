<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "page";
$route['admin'] = "admin";
$route['admin/page/(:any)'] = "admin/page/$1";
$route[':any'] = "page";

$route['404_override'] = '';