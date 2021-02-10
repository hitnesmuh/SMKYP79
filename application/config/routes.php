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
$route['default_controller'] = 'Controller_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login']['get'] = 'Controller_login/index';
$route['login']['post'] = 'Controller_login/login';
$route['logout'] = 'Controller_login/logout';

//admin
$route['admin'] = 'Controller_admin/index';
$route['admin/tambahuser'] = 'Controller_admin/tambahuser';
$route['admin/simpanuser'] = 'Controller_admin/simpanuser';
$route['admin/suntinguser/(:num)'] = 'Controller_admin/suntinguser/$1';
$route['admin/kategori'] = 'Controller_admin/kategori';
$route['admin/tambahkategori'] = 'Controller_admin/tambahkategori';
$route['admin/simpankategori'] = 'Controller_admin/simpankategori';
$route['admin/suntingkategori/(:num)'] = 'Controller_admin/suntingkategori/$1';
$route['admin/tampilmodul'] = 'Controller_admin/tampilmodul';
$route['admin/forum'] = 'Controller_admin/forum';
$route['admin/tampilrapat'] = 'Controller_admin/tampilrapat';
$route['admin/katadasar'] = 'Controller_admin/katadasar';
$route['admin/tambahkatadasar'] = 'Controller_admin/tambahkatadasar';
$route['admin/suntingkatadasar/(:num)'] = 'Controller_admin/suntingkatadasar/$1';
$route['admin/stopword'] = 'Controller_admin/stopword';
$route['admin/tambahstopword'] = 'Controller_admin/tambahstopword';
$route['admin/suntingstopword/(:num)'] = 'Controller_admin/suntingstopword/$1';
$route['admin/matapelajaran'] = 'Controller_admin/matapelajaran';
$route['admin/tampilmateri/(:num)'] = 'Controller_admin/materi/$1';
$route['admin/hitungbobot'] = 'Controller_admin/hitungbobot';
$route['admin/hitungpelatihan'] = 'Controller_admin/hitungpelatihan';
$route['admin/hitungmateri'] = 'Controller_admin/hitungmateri';

//Kurikulum
$route['kurikulum'] = 'Controller_kurikulum/index';
$route['kurikulum/tampilpelatihan'] = 'Controller_kurikulum/tampilpelatihan';
$route['kurikulum/tambahpelatihan'] = 'Controller_kurikulum/tambahpelatihan';
$route['kurikulum/simpanpelatihan'] = 'Controller_kurikulum/simpanpelatihan';
$route['kurikulum/tampilmatapelajaran'] = 'Controller_kurikulum/tampilmatapelajaran';
$route['kurikulum/tambahmatapelajaran'] = 'Controller_kurikulum/tambahmatapelajaran';
$route['kurikulum/simpanmatapelajaran'] = 'Controller_kurikulum/simpanmatapelajaran';
$route['kurikulum/suntingmatapelajaran/(:num)'] = 'Controller_kurikulum/suntingmatapelajaran/$1';
$route['kurikulum/simpansuntingmatapelajaran'] = 'Controller_kurikulum/simpansuntingmatapelajaran';
$route['kurikulum/tampilmateri/(:num)'] = 'Controller_kurikulum/tampilmateri/$1';
$route['kurikulum/tampilforum'] = 'Controller_kurikulum/tampilforum';
$route['kurikulum/tambahforum'] = 'Controller_kurikulum/tambahforum';
$route['kurikulum/simpanforum'] = 'Controller_kurikulum/simpanforum';
$route['kurikulum/suntingforum'] = 'Controller_kurikulum/suntingforum';
$route['kurikulum/simpansuntingforum'] = 'Controller_kurikulum/simpansuntingforum';

//Guru
$route['guru'] = 'Controller_guru/index';
$route['guru/pelatihanguru'] = 'Controller_guru/pelatihanguru';
$route['guru/matapelajaranguru'] = 'Controller_guru/matapelajaranguru';
$route['guru/tampilmateri/(:num)'] = 'Controller_guru/tampilmateri/$1';
$route['guru/tambahmateri/(:num)'] = 'Controller_guru/tambahmateri/$1';
$route['guru/suntingmateri/(:num)/(:num)'] = 'Controller_guru/suntingmateri/$1/$2';
$route['guru/tampilforum'] = 'Controller_guru/tampilforum';
$route['guru/tambahforum'] = 'Controller_guru/tambahforum';
$route['guru/simpanforum'] = 'Controller_guru/simpanforum';
$route['guru/tampilmodul'] = 'Controller_guru/tampilmodul';
$route['guru/tampilmatari'] = 'Controller_guru/tampilmatari';

//Profile
$route['profile'] = 'Controller_forum/profile';
$route['suntingprofile'] = 'Controller_forum/suntingprofile';
$route['ubahpassword'] = 'Controller_forum/ubahpassword';