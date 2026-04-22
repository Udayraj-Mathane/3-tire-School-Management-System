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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Routes For Students CRUD 
$route['api/students'] = 'api/ApiStudentsController/index';
$route['api/students/store'] = 'api/ApiStudentsController/storeStudents';
$route['api/students/update/(:any)'] = 'api/ApiStudentsController/updateStudents/$1';
$route['api/students/delete/(:any)'] = 'api/ApiStudentsController/deleteStudents/$1';
$route['api/students/(:any)'] = 'api/ApiStudentsController/findStudents/$1';
$route['api/students/school/(:any)'] = 'api/Students/bySchool/$1';


//Routes for School CRUD
$route['api/schools'] = 'api/ApiSchoolController/index';
$route['api/schools/store'] = 'api/ApiSchoolController/storeSchool';
$route['api/schools/(:any)'] = 'api/ApiSchoolController/findSchool/$1';
$route['api/schools/update/(:any)'] = 'api/ApiSchoolController/updateSchool/$1';
$route['api/schools/delete/(:any)'] = 'api/ApiSchoolController/deleteSchool/$1';


//Routes for Authentication Login & Register
$route['api/register'] = 'api/AuthController/register';
$route['api/login'] = 'api/AuthController/login';

//Routes for to create Admin
$route['api/admin/create'] = 'api/AdminController/createAdmin';
$route['api/admins']['GET'] = 'api/AdminController/index';