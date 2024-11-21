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
    $trail->push('Tags', route('dashboard.tag'));
});

// Dashboard > Tags
Breadcrumbs::for('db-tags-create', function (BreadcrumbTrail $trail) {
    $trail->parent('db-tags');
    $trail->push('Create', route('dashboard.tag.create'));
});

// Dashboard > Tags > Edit > [title]
Breadcrumbs::for('db-tags-edit', function (BreadcrumbTrail $trail, $tag) {
    $route =  route('dashboard.tag.edit', [
        'slugId' => $tag->id
    ]);
    $trail->parent('db-tags');
    $trail->push('Edit', $route);
    $trail->push($tag->title, $route);
});