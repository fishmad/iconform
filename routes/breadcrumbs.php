<?php

// Home
Breadcrumbs::register('/', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('home'));
});

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Home', route('home'));
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

// Home > Blog
Breadcrumbs::register('blog', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});