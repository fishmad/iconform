<?php


// Route::resource('/', 'Frontend\\FrontendController');
Route::view('/', 'frontend.default')->name('welcome');
Route::view('about', 'frontend.pages.about')->name('about');
Route::view('contact', 'frontend.pages.contact')->name('contact');
Route::view('faq', 'frontend.pages.faq')->name('faq');

Auth::routes();

Route::view('app', 'app.default')->name('app');
Route::get('app/dashboard', 'Dashboards\\DashboardController@index');
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
  Route::view('/blank', 'blank');
  // Route::view('/demo', 'demo.coreui.dashboard');
  // Route::view('/demo/coreui', 'demo.coreui.dashboard');
  // Route::view('/demo/coreui/dashboard', 'demo.coreui.dashboard');
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