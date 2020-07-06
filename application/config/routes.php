<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['pay'] = 'pay';
$route['pay/validate'] = 'pay/validate';

$route['default_controller'] = 'welcome';

$route['(:any)']='welcome/index/$1';

// $routes->add('default_controller', function()
// {
//    echo 'okkk';
// });

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

