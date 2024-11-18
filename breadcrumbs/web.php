<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.home'));
});

// Dashboard > Tags
Breadcrumbs::for('db-tags', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dashboard', route('dashboard.home'));
});

// Dashboard > Tags
Breadcrumbs::for('db-tags-create', function (BreadcrumbTrail $trail) {
    $trail->parent('db-tags');
    $trail->push('Create', route('dashboard.tag.create'));
});