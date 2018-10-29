<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Loginpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'register';
$route['(:any)'] = '$1';
$route['loginpage/login'] = 'loginpage/login';