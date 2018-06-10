<?php


// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('About', route('about'));
});

// Home > Contact
Breadcrumbs::register('contact', function ($breadcrumbs) {
  $breadcrumbs->parent('about');
  $breadcrumbs->push('Contact us', route('contact'));
});


// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Dashboard', route('dashboard'));
});




// Home > Settings >
#################################################################################
Breadcrumbs::register('.settings.default', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Settings', route('.settings.default'));
});
#################################################################################

// Home > Settings > users >
#################################################################################
Breadcrumbs::register('.settings.users.index', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.default');
  $breadcrumbs->push('Users', route('.settings.users.index'));
});
// Home > Settings > Users > Create
Breadcrumbs::register('.settings.users.create', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.users.index');
  $breadcrumbs->push('Create User', route('.settings.users.create'));
});
// Home > Settings > Users > Show
Breadcrumbs::register('.settings.users.show', function ($breadcrumbs, $user) {
  $breadcrumbs->parent('.settings.users.index');
  $breadcrumbs->push('Show User', route('.settings.users.show', $user));
});
// Home > Settings > Users > Edit
Breadcrumbs::register('.settings.users.edit', function ($breadcrumbs, $user) {
  $breadcrumbs->parent('.settings.users.index');
  $breadcrumbs->push('Edit User', route('.settings.users.edit', $user));
});
#################################################################################

// Home > Settings > Roles > 
#################################################################################
Breadcrumbs::register('.settings.roles.index', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.default');
  $breadcrumbs->push('Roles', route('.settings.roles.index'));
});
// Home > Settings > Roles > Create
Breadcrumbs::register('.settings.roles.create', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.roles.index');
  $breadcrumbs->push('Create Role', route('.settings.roles.create'));
});
// Home > Settings > Roles > Show
Breadcrumbs::register('.settings.roles.show', function ($breadcrumbs, $role) {
  $breadcrumbs->parent('.settings.roles.index');
  $breadcrumbs->push('Show Role', route('.settings.roles.show', $role));
});
// Home > Settings > Roles > Edit
Breadcrumbs::register('.settings.roles.edit', function ($breadcrumbs, $role) {
  $breadcrumbs->parent('.settings.roles.index');
  $breadcrumbs->push('Edit Role', route('.settings.roles.edit', $role));
});
#################################################################################

// Home > Settings > Permissions >
################################################################################# 
Breadcrumbs::register('.settings.permissions.index', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.default');
  $breadcrumbs->push('Permissions', route('.settings.permissions.index'));
});
// Home > Settings > Permissions > Create
Breadcrumbs::register('.settings.permissions.create', function ($breadcrumbs) {
  $breadcrumbs->parent('.settings.permissions.index');
  $breadcrumbs->push('Create Permission', route('.settings.permissions.create'));
});
// Home > Settings > Permissions > Show
Breadcrumbs::register('.settings.permissions.show', function ($breadcrumbs, $permission) {
  $breadcrumbs->parent('.settings.permissions.index');
  $breadcrumbs->push('Show Permission', route('.settings.permissions.show', $permission));
});
// Home > Settings > Permissions > Edit
Breadcrumbs::register('.settings.permissions.edit', function ($breadcrumbs, $permission) {
  $breadcrumbs->parent('.settings.permissions.index');
  $breadcrumbs->push('Edit Permission', route('.settings.permissions.edit', $permission));
});
#################################################################################

// Home > Registers
Breadcrumbs::register('.registers.default', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Registers', route('.registers.default'));
});

// Home > Registers > Samples > 
#################################################################################
Breadcrumbs::register('.registers.samples.index', function ($breadcrumbs) {
  $breadcrumbs->parent('.registers.default');
  $breadcrumbs->push('Samples', route('.registers.samples.index'));
});
// Home > Registers > Samples > Create
Breadcrumbs::register('.registers.samples.create', function ($breadcrumbs) {
  $breadcrumbs->parent('.registers.samples.index');
  $breadcrumbs->push('Create', route('.registers.samples.create'));
});
// Home > Registers > Samples > Show
Breadcrumbs::register('.registers.samples.show', function ($breadcrumbs, $sample) {
  $breadcrumbs->parent('.registers.samples.index');
  $breadcrumbs->push('Show', route('.registers.samples.show', $sample));
});
// Home > Registers > Samples > Edit
Breadcrumbs::register('.registers.samples.edit', function ($breadcrumbs, $sample) {
  $breadcrumbs->parent('.registers.samples.index');
  $breadcrumbs->push('Edit', route('.registers.samples.edit', $sample));
});
#################################################################################
