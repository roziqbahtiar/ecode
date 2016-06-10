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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Route Dashboard */
$route['dashboard'] = 'DB_home';
$route['dashboard/user/(:any)'] = 'DB_profil/user/$1';
$route['dashboard/profil'] = 'DB_profil/profil';
$route['dashboard/profil/edit-profil'] = 'DB_profil/edit_profil';
$route['dashboard/profil/edit-password'] = 'DB_profil/edit_password';
$route['dashboard/materi'] = 'DB_materi/materi';
$route['dashboard/materi/baru'] = 'DB_materi/materi_baru';
$route['dashboard/materi/edit/(:any)'] = 'DB_materi/materi_edit/$1';
$route['dashboard/latihan'] = 'DB_latihan/latihan';
$route['dashboard/latihan/baru'] = 'DB_latihan/latihan_baru';
$route['dashboard/latihan/materi/(:any)'] = 'DB_latihan/latihan_view/$1';
$route['dashboard/kategori'] = 'DB_kategori/kategori';
$route['dashboard/kategori/baru'] = 'DB_kategori/kategori_baru';
$route['dashboard/kategori/materi/(:any)'] = 'DB_kategori/kategori_view/$1';
$route['dashboard/member'] = 'DB_member/member';
$route['dashboard/pelajaran/(:any)'] = 'DB_pelajaran/pelajaran/$1';
$route['dashboard/lihat/pelajaran/(:any)'] = 'DB_pelajaran/lihat_p/$1';
$route['dashboard/lihat/soal/(:any)'] = 'DB_pelajaran/lihat_s/$1';

/* Another Route */
$route['login'] = 'Auth/login';
$route['daftar'] = 'Auth/daftar';
$route['logout'] = 'Auth/logout';
