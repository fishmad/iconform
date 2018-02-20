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
//Route::middleware('auth')->group(function() {
  // Section CoreUI elements

  Route::view('/demo/all', 'demo.dashboard');
  Route::view('/demo/buttons', 'demo.buttons');
  Route::view('/demo/social', 'demo.social');
  Route::view('/demo/cards', 'demo.cards');
  Route::view('/demo/forms', 'demo.forms');
  Route::view('/demo/modals', 'demo.modals');
  Route::view('/demo/switches', 'demo.switches');
  Route::view('/demo/tables', 'demo.tables');
  Route::view('/demo/tabs', 'demo.tabs');
  Route::view('/demo/icons-font-awesome', 'demo.font-awesome-icons');
  Route::view('/demo/icons-simple-line', 'demo.simple-line-icons');
  Route::view('/demo/widgets', 'demo.widgets');
  Route::view('/demo/charts', 'demo.charts');
  Route::view('/demo/error404','demo._errors.404');
  Route::view('/demo/error500','demo._errors.500');
  Route::view('/demo/login','demo.pages.login');
  Route::view('/demo/register','demo.pages.register');
//});

// Section Pages
Route::view('/error404','_errors.404')->name('error404');
Route::view('/error500','_errors.500')->name('error500');