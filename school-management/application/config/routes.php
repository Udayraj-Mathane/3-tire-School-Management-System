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
// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

// $route['default_controller'] = 'students';

// // Student Management Routes
// $route['students']              = 'Students/index';       // List all students
// $route['students/create']       = 'Students/create';      // Show add form
// $route['students/store']        = 'Students/store';       // Submit add form (POST)
// $route['students/edit/(:num)']  = 'Students/edit/$1';     // Show edit form
// $route['students/update/(:num)']= 'Students/update/$1';   // Submit edit form (POST)
// $route['students/delete/(:num)']= 'Students/delete/$1';   // Delete student (POST)

// $route['default_controller'] = 'students';

// Student Management Routes
// $route['students'] = 'students/index';
//student profile
// $route['student/profile'] = 'Student/Profile/index';
// $route['student/profile/update'] = 'Student/Profile/update';

// $route['students/create'] = 'students/create';
// $route['students/store']  = 'students/store';

// $route['students/edit/(:num)']   = 'students/edit/$1';
// $route['students/update/(:num)'] = 'students/update/$1';

// $route['students/delete/(:num)'] = 'students/delete/$1';

// Login and Register for User and Admin
// $route['register']['GET'] = 'Auth/RegisterController/index';
// $route['register']['POST'] = 'Auth/RegisterController/register';

// $route['login']['GET'] = 'Auth/LoginController/index';
// $route['login']['POST'] = 'Auth/LoginController/login';
// $route['logout']['GET'] = 'Auth/LoginController/logout';


// Temporary alias for the old misspelled URL
// $route['regester']['GET'] = 'Auth/RegisterController/index';

//Superadmin routes
// $route['superadmin/dashboard'] = 'superadmin/Dashboard/index';
// $route['superadmin/schools'] = 'superadmin/Schools/index';
// $route['superadmin/schools/create'] = 'superadmin/Schools/create';
// $route['superadmin/schools/store'] = 'superadmin/Schools/store';
// $route['superadmin/admins/create'] = 'superadmin/Admins/create';
// $route['superadmin/admins/store']  = 'superadmin/Admins/store';

$route['default_controller'] = 'Home';

   // AUTH ROUTES

$route['login']['GET']  = 'Auth/LoginController/index';
$route['login']['POST'] = 'Auth/LoginController/login';
$route['logout']        = 'Auth/LoginController/logout';

$route['register']['GET']  = 'Auth/RegisterController/index';
$route['register']['POST'] = 'Auth/RegisterController/register';


    //SUPER ADMIN ROUTES
    
$route['superadmin/dashboard'] = 'Superadmin/Dashboard/index';

$route['superadmin/schools']         = 'Superadmin/Schools/index';
$route['superadmin/schools/create']  = 'Superadmin/Schools/create';
$route['superadmin/schools/store']   = 'Superadmin/Schools/store';

$route['superadmin/admins']        = 'Superadmin/Admins/index';
$route['superadmin/admins/create'] = 'Superadmin/Admins/create';
$route['superadmin/admins/store']  = 'Superadmin/Admins/store';

  //  ADMIN ROUTES

$route['admin/dashboard'] = 'Admin/Dashboard/index';

$route['admin/students'] = 'Admin/Students/index';
$route['admin/students/create'] = 'Admin/Students/create';
$route['admin/students/store']  = 'Admin/Students/store';

$route['admin/students/edit/(:num)']   = 'Admin/Students/edit/$1';
$route['admin/students/update/(:num)'] = 'Admin/Students/update/$1';
$route['admin/students/delete/(:num)'] = 'Admin/Students/delete/$1';
$route['admin/students/edit.php/(:num)']   = 'Admin/Students/edit/$1';
$route['admin/students/update.php/(:num)'] = 'Admin/Students/update/$1';

    //STUDENT ROUTES

$route['student/dashboard'] = 'Student/Dashboard/index';

$route['student/profile']        = 'Student/Profile/index';
$route['student/profile/update'] = 'Student/Profile/update';


 
// old student routes (only for testing)
// $route['students'] = 'Students/index';
