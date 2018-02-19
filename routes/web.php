<?php


// Route::resource('/', 'Frontend\\FrontendController');
// Route::view('/', 'frontend.default')->name('welcome');
Route::view('about', 'frontend.pages.about')->name('about');
Route::view('contact', 'frontend.pages.contact')->name('contact');
Route::view('faq', 'frontend.pages.faq')->name('faq');

Auth::routes();

Route::get('/', 'Dashboards\\DashboardController@index')->name('home');
Route::get('app', 'Dashboards\\DashboardController@index')->name('app');
Route::get('app/dashboard', 'Dashboards\\DashboardController@index')->name('dashboard');
// Route::view('app/dashboard', 'app.dashboard.index')->name('dashboard');

/* Settings */
Route::view('app/settings', 'app.settings.default')->name('app.settings.default'); // Required
Route::namespace('Settings')->prefix('app/settings')->name('app.settings.')->group(function () {
  Route::resource('users', 'UserController');
  Route::resource('roles', 'RoleController');
  Route::resource('permissions', 'PermissionController');
});

/* Settings - vendor routes requiring auth protection */
Route::middleware('auth')->group(function() {
  Route::get('app/tools/crud', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@getGenerator'])->name('getCrud');
  Route::post('app/tools/crud', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@postGenerator'])->name('postCrud');
});

/* Registers */
Route::namespace('Registers')->prefix('app/registers')->name('app.registers.')->group(function () {
  Route::get('samples/datatables', 'SamplesController@datatables');
  Route::resource('samples', 'SamplesController');
});


/* Settings - vendor routes requiring auth protection */
Route::middleware('auth')->group(function() {
  // Section CoreUI elements
  // Route::view('/demo', 'demo.coreui.dashboard');
  // Route::view('/demo/coreui', 'demo.coreui.dashboard');
  Route::view('/demo/coreui/dashboard', 'vendor.demo.coreui.dashboard');
  Route::view('/demo/coreui/buttons', 'vendor.demo.coreui.buttons');
  Route::view('/demo/coreui/social', 'vendor.demo.coreui.social');
  Route::view('/demo/coreui/cards', 'vendor.demo.coreui.cards');
  Route::view('/demo/coreui/forms', 'vendor.demo.coreui.forms');
  Route::view('/demo/coreui/modals', 'vendor.demo.coreui.modals');
  Route::view('/demo/coreui/switches', 'vendor.demo.coreui.switches');
  Route::view('/demo/coreui/tables', 'vendor.demo.coreui.tables');
  Route::view('/demo/coreui/tabs', 'vendor.demo.coreui.tabs');
  Route::view('/demo/coreui/icons-font-awesome', 'vendor.demo.coreui.font-awesome-icons');
  Route::view('/demo/coreui/icons-simple-line', 'vendor.demo.coreui.simple-line-icons');
  Route::view('/demo/coreui/widgets', 'vendor.demo.coreui.widgets');
  Route::view('/demo/coreui/charts', 'vendor.demo.coreui.charts');
  Route::view('/demo/coreui/error404','vendor.demo.coreui._errors.404');
  Route::view('/demo/coreui/error500','vendor.demo.coreui._errors.500');
  Route::view('/demo/coreui/login','vendor.demo.coreui.pages.login');
  Route::view('/demo/coreui/register','vendor.demo.coreui.pages.register');
});

// Section Pages
Route::view('/error404','_errors.404')->name('error404');
Route::view('/error500','_errors.500')->name('error500');