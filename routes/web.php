<?php

Route::get('/', 'HomeController@index')->name('/');
Route::get('home', 'HomeController@index')->name('home');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Auth::routes();

Route::get('admin', 'Admin\AdminController@index');

Route::resource('settings/users', 'Settings\UserController');
Route::resource('settings/roles', 'Settings\RoleController');
Route::resource('settings/permissions', 'Settings\PermissionController');

Route::get('tools/crud', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@getGenerator']);
Route::post('tools/crud', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@postGenerator']);

Route::get('settings/samples/datatables', 'Settings\\SamplesController@datatables')->name('settings.samples.datatables');
Route::resource('settings/samples', 'Settings\\SamplesController');

// Route::get('settings/samples', 'Admin\\SamplesController@index');
// Route::get('settings/samples/{id}', 'Admin\\SamplesController@show');
// Route::get('settings/samples/{sample}', 'Admin\\SamplesController@show');

/* CoreUI templates */
Route::middleware('auth')->group(function() {
  
  // Section CoreUI elements
  Route::view('/blank', 'blank');
  Route::view('/dashboard', 'dashboard');
  Route::view('/demo', 'demo.coreui.dashboard');
  Route::view('/demo/coreui', 'demo.coreui.dashboard');
  Route::view('/demo/coreui/dashboard', 'demo.coreui.dashboard');
  Route::view('/demo/coreui/buttons', 'demo.coreui.buttons');
	Route::view('/demo/coreui/social', 'demo.coreui.social');
	Route::view('/demo/coreui/cards', 'demo.coreui.cards');
	Route::view('/demo/coreui/forms', 'demo.coreui.forms');
	Route::view('/demo/coreui/modals', 'demo.coreui.modals');
	Route::view('/demo/coreui/switches', 'demo.coreui.switches');
	Route::view('/demo/coreui/tables', 'demo.coreui.tables');
	Route::view('/demo/coreui/tabs', 'demo.coreui.tabs');
	Route::view('/demo/coreui/icons-font-awesome', 'demo.coreui.font-awesome-icons');
	Route::view('/demo/coreui/icons-simple-line', 'demo.coreui.simple-line-icons');
	Route::view('/demo/coreui/widgets', 'demo.coreui.widgets');
  Route::view('/demo/coreui/charts', 'demo.coreui.charts');
  Route::view('/demo/coreui/error404','demo.coreui._errors.404');
  Route::view('/demo/coreui/error500','demo.coreui._errors.500');
  Route::view('/demo/coreui/login','demo.coreui.pages.login');
  Route::view('/demo/coreui/register','demo.coreui.pages.register');
});

// Section Pages
Route::view('/error404','_errors.404')->name('error404');
Route::view('/error500','_errors.500')->name('error500');