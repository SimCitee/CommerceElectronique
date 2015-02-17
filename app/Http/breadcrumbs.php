<?php
/**
 * Created by PhpStorm.
 * User: Simon Dupré
 * Date: 2015-02-16
 * Time: 6:32 PM
 */


// Admin > Users
Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->push(Lang::get('users.users'), route('admin.users.index'));
});

// Admin > Users > Create
Breadcrumbs::register('users_create', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push(Lang::get('users.create_new_user'), route('admin.users.create'));
});

// Admin > Users > Edit
Breadcrumbs::register('users_edit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push($user->fullname(), route('admin.users.edit', $user));
});

// Admin > Users > Show
Breadcrumbs::register('users_show', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push($user->fullname(), route('admin.users.show', $user));
});