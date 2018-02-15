<?php

// Home
Breadcrumbs::register('/', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('home'));
});

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('home'));
});

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Dashboard', route('dashboard'));
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


// Home > Settings >
#################################################################################
Breadcrumbs::register('settings.index', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Settings', route('settings.index'));
});
#################################################################################

// Home > Settings > users >
#################################################################################
Breadcrumbs::register('settings.users.index', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.index');
  $breadcrumbs->push('Users', route('settings.users.index'));
});
// Home > Settings > Users > Create
Breadcrumbs::register('settings.users.create', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.users.index');
  $breadcrumbs->push('Create User', route('settings.users.create'));
});
// Home > Settings > Users > Edit
Breadcrumbs::register('settings.users.edit', function ($breadcrumbs, $user) {
  $breadcrumbs->parent('settings.users.index');
  $breadcrumbs->push('Edit User ' . $user, route('settings.users.edit', $user));
});
#################################################################################

// Home > Settings > Roles > 
#################################################################################
Breadcrumbs::register('settings.roles.index', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.index');
  $breadcrumbs->push('Roles', route('settings.roles.index'));
});
// Home > Settings > Roles > Create
Breadcrumbs::register('settings.roles.create', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.roles.index');
  $breadcrumbs->push('Create Role', route('settings.roles.create'));
});
// Home > Settings > Roles > Edit
Breadcrumbs::register('settings.roles.edit', function ($breadcrumbs, $role) {
  $breadcrumbs->parent('settings.roles.index');
  $breadcrumbs->push('Edit Role ' . $role, route('settings.roles.edit', $role));
});
#################################################################################

// Home > Settings > Permissions >
################################################################################# 
Breadcrumbs::register('settings.permissions.index', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.index');
  $breadcrumbs->push('Permissions', route('settings.permissions.index'));
});
// Home > Settings > Permissions > Create
Breadcrumbs::register('settings.permissions.create', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.permissions.index');
  $breadcrumbs->push('Create Permission', route('settings.permissions.create'));
});
// Home > Settings > Permissions > Edit
Breadcrumbs::register('settings.permissions.edit', function ($breadcrumbs, $permission) {
  $breadcrumbs->parent('settings.permissions.index');
  $breadcrumbs->push('Edit Permission ' . $permission, route('settings.permissions.edit', $permission));
});
#################################################################################

// Home > Settings > Samples > 
#################################################################################
Breadcrumbs::register('settings.samples.index', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.index');
  $breadcrumbs->push('Samples', route('settings.samples.index'));
});
// Home > Settings > Samples > Create
Breadcrumbs::register('settings.samples.create', function ($breadcrumbs) {
  $breadcrumbs->parent('settings.samples.index');
  $breadcrumbs->push('Create Sample', route('settings.samples.create'));
});
// Home > Settings > Samples > Edit
Breadcrumbs::register('settings.samples.edit', function ($breadcrumbs, $sample) {
  $breadcrumbs->parent('settings.samples.index');
  $breadcrumbs->push('Edit Sample ' . $sample, route('settings.samples.edit', $sample));
});
#################################################################################
