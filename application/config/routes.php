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
|http://discounts.hereyago.com/discounts?p=2879083&qcode=112017281041
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'index';
$route['dashboard'] = 'index/dashboard';
$route['coupounsall'] = 'index/coupounscj';
$route['getcoupounsall'] = 'index/getClientCoupouns';
$route['smsapi'] = 'webapi/sendSms';
$route['runner'] = 'runner/index';
$route['runner/(:any)/(:any)'] = 'runner/index/$1/$1';
$route['nextstep1/(:any)'] = 'runner/next1/$1';
$route['nextstep1/(:any)/(:any)'] = 'runner/next1/$1/$1';
$route['nextstep2/(:any)'] = 'runner/next2/$1';
$route['coupouns'] = 'webapi/add_mycoupouns';
$route['linkcoupouns'] = 'webapi/add_linkcoupouns';
$route['flexcoupouns'] = 'webapi/add_flexofferscoupouns';
$route['delcoupouns'] = 'webapi/del_mycoupouns';
$route['deletecoupouns'] = 'webapi/deleteCoup';
$route['coupouns/(:any)'] = 'webapi/add_mycoupouns/$1';
$route['addCoupounsFlex'] = 'index/add_myFlexoffers';
$route['addCoupLinkshare'] = 'index/add_myLinkshare';
$route['verifyMail/(:any)'] = 'webapi/index/$1';
$route['activeUser/(:any)'] = 'webapi/activeLink/$1';
$route['users'] = 'index/users';
$route['mngrunner'] = 'runner/manage';
$route['viewRunner/(:any)'] = 'runner/view_runner/$1';
$route['editRunner/(:any)'] = 'runner/edit_runner/$1';
$route['deleteRunner/(:any)'] = 'runner/delete/$1';
$route['editRunner/(:any)/(:any)'] = 'runner/edit_runner/$1/$1';
$route['editnextstep1/(:any)'] = 'runner/edit_next1/$1';
$route['editnextstep1/(:any)/(:any)'] = 'runner/edit_next1/$1/$1';
$route['editnextstep2/(:any)'] = 'runner/edit_next2/$1';
$route['thanks'] = 'runner/thanks';
$route['viewUsers/(:any)'] = "index/view_users/$1";
$route['bigpicture'] = 'index/bigPict';
$route['addbigpicture'] = 'index/addBigPict';
$route['timeOut'] = 'discounts/expired';
$route['viewBigPic/(:any)'] = "index/view_bigPict/$1";
$route['editBigPic/(:any)'] = "index/edit_bigPict/$1";
$route['discounts'] = 'discounts/index';
$route['discounts/(:any)'] = 'discounts/index/$1';
$route['discountsVertical'] = 'discounts/vertical';
$route['discountsVertical/(:any)'] = 'discounts/vertical/$1';
//$route['discounts/(:any)/(:any)/(:any)/(:any)'] = \'discounts/index/$1/$1/$1/$1';
$route['searchResults'] = 'discounts/search';
$route['simillarly/(:any)'] = 'discounts/simillarsearch/$1';
$route['viewDiscount/(:any)'] = 'discounts/viewMore/$1';
//$route['addbadges'] = 'index/add_mybadges';
//$route['jsBadges'] = 'index/mngBdg';
//$route['categories'] = 'index/mycategory';
//$route['addcategories'] = 'index/add_mycategory';
$route['addTask'] = 'webapi/onfleet';
$route['jsCat'] = 'index/mngCat';
$route['logout'] = 'index/logoff';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
