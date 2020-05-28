<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('pages.index');
});
// Customer

Route::get('/listings', function () {
    return view('pages.customer.view_listings');
});
Route::get('/blog', function () {
    return view('pages.blog');
});

// ------------------------ADMIN---------------------------
Route::get('/admin', function () {
    return view('layouts.admin_layout');
});

// Reports

Route::get('/admin/reports', function () {
    return view('pages.admin.admin_reports');
});

// Listings

Route::get('/admin/listings', function () {
    return view('pages.admin.admin_listings');
});

Route::get('/admin/listings/create', function () {
    return view('pages.admin.admin_listings_create');
});

// Agents

Route::get('/admin/agents', function () {
    return view('pages.admin.admin_agents');
});

Route::get('/admin/agents/create', function () {
    return view('pages.admin.admin_agents_create');
});

// Blog
/*
Route::get('/admin/blog', function () {
    return view('pages.admin.admin_blog');
});
*/
Route::Resource('/admin/blog','BlogPostController');

<<<<<<< HEAD
Route::get('/blog', 'BlogPostController@clientIndex' );
=======
Route::get('/admin/blog/create', function () {
    return view('pages.admin.admin_blog_create');
});

Route::get('/customer/index', function () {
    return view('pages.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> authentication
