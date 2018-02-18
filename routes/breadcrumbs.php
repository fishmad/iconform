<?php

// Home
Breadcrumbs::register('/', function ($breadcrumbs) {
  $breadcrumbs->push('Frontend', route('frontend.default'));
});

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('app'));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('About', route('about'));
});

// Home > About > Contact
Breadcrumbs::register('contact', function ($breadcrumbs) {
  $breadcrumbs->parent('about');
  $breadcrumbs->push('Contact us', route('contact'));
});

// Home > FAQ
Breadcrumbs::register('faq.faq', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('FAQ', route('faq.faq'));
});





// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Dashboard', route('dashboard'));
});




// Home > Settings >
#################################################################################
Breadcrumbs::register('app.settings.default', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Settings', route('app.settings.default'));
});
#################################################################################

// Home > Settings > users >
#################################################################################
Breadcrumbs::register('app.settings.users.index', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.default');
  $breadcrumbs->push('Users', route('app.settings.users.index'));
});
// Home > Settings > Users > Create
Breadcrumbs::register('app.settings.users.create', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.users.index');
  $breadcrumbs->push('Create User', route('app.settings.users.create'));
});
// Home > Settings > Users > Show
Breadcrumbs::register('app.settings.users.show', function ($breadcrumbs, $user) {
  $breadcrumbs->parent('app.settings.users.index');
  $breadcrumbs->push('Show User', route('app.settings.users.show', $user));
});
// Home > Settings > Users > Edit
Breadcrumbs::register('app.settings.users.edit', function ($breadcrumbs, $user) {
  $breadcrumbs->parent('app.settings.users.index');
  $breadcrumbs->push('Edit User', route('app.settings.users.edit', $user));
});
#################################################################################

// Home > Settings > Roles > 
#################################################################################
Breadcrumbs::register('app.settings.roles.index', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.default');
  $breadcrumbs->push('Roles', route('app.settings.roles.index'));
});
// Home > Settings > Roles > Create
Breadcrumbs::register('app.settings.roles.create', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.roles.index');
  $breadcrumbs->push('Create Role', route('app.settings.roles.create'));
});
// Home > Settings > Roles > Show
Breadcrumbs::register('app.settings.roles.show', function ($breadcrumbs, $role) {
  $breadcrumbs->parent('app.settings.roles.index');
  $breadcrumbs->push('Show Role', route('app.settings.roles.show', $role));
});
// Home > Settings > Roles > Edit
Breadcrumbs::register('app.settings.roles.edit', function ($breadcrumbs, $role) {
  $breadcrumbs->parent('app.settings.roles.index');
  $breadcrumbs->push('Edit Role', route('app.settings.roles.edit', $role));
});
#################################################################################

// Home > Settings > Permissions >
################################################################################# 
Breadcrumbs::register('app.settings.permissions.index', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.default');
  $breadcrumbs->push('Permissions', route('app.settings.permissions.index'));
});
// Home > Settings > Permissions > Create
Breadcrumbs::register('app.settings.permissions.create', function ($breadcrumbs) {
  $breadcrumbs->parent('app.settings.permissions.index');
  $breadcrumbs->push('Create Permission', route('app.settings.permissions.create'));
});
// Home > Settings > Permissions > Show
Breadcrumbs::register('app.settings.permissions.show', function ($breadcrumbs, $permission) {
  $breadcrumbs->parent('app.settings.permissions.index');
  $breadcrumbs->push('Show Permission', route('app.settings.permissions.show', $permission));
});
// Home > Settings > Permissions > Edit
Breadcrumbs::register('app.settings.permissions.edit', function ($breadcrumbs, $permission) {
  $breadcrumbs->parent('app.settings.permissions.index');
  $breadcrumbs->push('Edit Permission', route('app.settings.permissions.edit', $permission));
});
#################################################################################

// Home > Registers > Samples > 
#################################################################################
Breadcrumbs::register('app.registers.samples.index', function ($breadcrumbs) {
  $breadcrumbs->parent('app.registers.index');
  $breadcrumbs->push('Samples', route('app.registers.samples.index'));
});
// Home > Registers > Samples > Create
Breadcrumbs::register('app.registers.samples.create', function ($breadcrumbs) {
  $breadcrumbs->parent('app.registers.samples.index');
  $breadcrumbs->push('Create Sample', route('app.registers.samples.create'));
});
// Home > Registers > Samples > Show
Breadcrumbs::register('app.registers.samples.show', function ($breadcrumbs) {
  $breadcrumbs->parent('app.registers.samples.index');
  $breadcrumbs->push('Show Sample', route('app.registers.samples.show'));
});
// Home > Registers > Samples > Edit
Breadcrumbs::register('app.registers.samples.edit', function ($breadcrumbs, $sample) {
  $breadcrumbs->parent('app.registers.samples.index');
  $breadcrumbs->push('Edit Sample ' . $sample, route('app.registers.samples.edit', $sample));
});
#################################################################################
