<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

$route['admin'] = 'admin/admin/index';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/change_password'] = 'admin/admin/change_password';
$route['admin/logout'] = 'admin/admin/logout';


$route['about-us'] = 'about';

$route['course'] = 'course/Course';
$route['course-details'] = 'course/courseDetails';
$route['(:any).(html)'] = 'course/listing/$1';
$route['(:any)/(:any).(html)'] = 'course/detail/$1/$2';

$route['return-policy'] = 'welcome/return_policy';
$route['contact-us'] = 'contact';
$route['privacy-policy'] = 'welcome/privacy_policy';
$route['terms-conditions'] = 'welcome/terms_conditions';
$route['track-your-order'] = 'welcome/track_your_order';
$route['tutor-details/(:any)'] = 'welcome/tutorDetails/$1';
$route['coupon'] = 'welcome/coupon';
$route['site-map'] = 'welcome/sitemap';
$route['success'] ='Payment/success/';
$route['failed'] ='Payment/failed/';

// $route['review'] = 'welcome/review';
$route['404_override'] = 'welcome/error404';
$route['404'] = 'welcome/error404';
$route['translate_uri_dashes'] = FALSE;

