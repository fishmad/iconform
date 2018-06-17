<?php


Route::middleware('auth')->group(function() {
  Route::view('about', 'pages.about')->name('about');
  Route::view('contact', 'pages.contact')->name('contact');
});

Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

//Route::get('dashboard', 'DashboardController@index')->name('dashboard');
// Route::view('dashboard', 'dashboard.index')->name('dashboard');

/* Settings - vendor routes requiring auth protection */
Route::middleware('auth')->group(function() {
  Route::get('crud', ['uses' => 'ProcessController@getGenerator'])->name('getCrud');
  Route::post('crud', ['uses' => 'ProcessController@postGenerator'])->name('postCrud');
});

// /* Settings */
// Route::view('settings', 'settings.default')->name('settings.default'); // Required

// Route::namespace('Settings')->prefix('settings')->name('settings.')->group(function () {
//   Route::get('users/datatables', 'UserController@datatables');
//   Route::resource('users', 'UserController');
//   Route::get('roles/datatables', 'RoleController@datatables');
//   Route::resource('roles', 'RoleController');
//   Route::get('permissions/datatables', 'PermissionController@datatables');
//   Route::resource('permissions', 'PermissionController');
// });

Route::get('users/datatables', 'UserController@datatables');
Route::resource('users', 'UserController');

Route::get('roles/datatables', 'RoleController@datatables');
Route::resource('roles', 'RoleController');

Route::get('permissions/datatables', 'PermissionController@datatables');
Route::resource('permissions', 'PermissionController');

/* Registers */
Route::view('registers', 'registers.default')->name('registers.default'); // Require
Route::namespace('Registers')->prefix('registers')->name('registers.')->group(function () {
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


Route::get('samples/datatables', 'SamplesController@datatables');
Route::resource('samples', 'SamplesController');

Route::resource('page', 'PageController');

Route::get('kid/datatables', 'KidController@datatables');
Route::resource('kid', 'KidController');

Route::get('owls/datatables', 'OwlsController@datatables');
Route::resource('owls', 'OwlsController');

Route::get('tree/datatables', 'TreeController@datatables');
Route::resource('tree', 'TreeController');
Route::resource('tool', 'ToolController');
Route::resource('frog', 'FrogController');
Route::resource('abo', 'AboController');
Route::resource('bird', 'birdController');
Route::get('bark/datatables', 'BarkController@datatables');
Route::resource('bark', 'BarkController');
Route::get('emu/datatables', 'EmuController@datatables');
Route::resource('emu', 'EmuController');
Route::get('zebra/datatables', 'ZebraController@datatables');
Route::resource('zebra', 'ZebraController');
Route::get('donkey/datatables', 'DonkeyController@datatables');
Route::resource('donkey', 'DonkeyController');
Route::get('donkey/datatables', 'DonkeyController@datatables');
Route::resource('donkey', 'DonkeyController');
Route::get('mouse/datatables', 'MouseController@datatables');
Route::resource('mouse', 'MouseController');
Route::get('fire/datatables', 'FireController@datatables');
Route::resource('fire', 'FireController');
Route::get('river/datatables', 'RiverController@datatables');
Route::resource('river', 'RiverController');
Route::get('lee/datatables', 'lee@datatables');
Route::resource('lee', 'lee');

Route::resource('lake', 'LakeController');
Route::get('lake/datatables', 'LakeController@datatables');
Route::resource('lake', 'LakeController');

Route::get('lee/datatables', 'lee@datatables');
Route::resource('lee', 'lee');
Route::get('cat/datatables', 'CatController@datatables');
Route::resource('cat', 'CatController');
Route::get('cat/datatables', 'CatController@datatables');
Route::resource('cat', 'CatController');
Route::get('fire/datatables', 'FireController@datatables');
Route::resource('fire', 'FireController');
Route::get('cars/datatables', 'CarsController@datatables');
Route::resource('cars', 'CarsController');
Route::get('boots/datatables', 'BootsController@datatables');
Route::resource('boots', 'BootsController');
Route::get('elephants/datatables', 'ElephantsController@datatables');
Route::resource('elephants', 'ElephantsController');
Route::get('birds/datatables', 'BirdsController@datatables');
Route::resource('birds', 'BirdsController');
Route::get('flowers/datatables', 'FlowersController@datatables');
Route::resource('flowers', 'FlowersController');
Route::get('pots/datatables', 'PotsController@datatables');
Route::resource('pots', 'PotsController');
Route::get('trees/datatables', 'TreesController@datatables');
Route::resource('trees', 'TreesController');
Route::get('goats/datatables', 'GoatsController@datatables');
Route::resource('goats', 'GoatsController');
Route::get('cows/datatables', 'CowsController@datatables');
Route::resource('cows', 'CowsController');
Route::get('chickens/datatables', 'ChickensController@datatables');
Route::resource('chickens', 'ChickensController');
Route::get('frogs/datatables', 'FrogsController@datatables');
Route::resource('frogs', 'FrogsController');
Route::get('ants/datatables', 'AntsController@datatables');
Route::resource('ants', 'AntsController');
Route::get('bicycles/datatables', 'BicyclesController@datatables');
Route::resource('bicycles', 'BicyclesController');