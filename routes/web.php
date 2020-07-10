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
Route::get('/', 'HomeController@index_client' );
Route::get('/agents', 'agentsPropertiesController@index')->middleware('can:agentGate');
// Customer

Route::get('/listings', function () {
    return view('pages.customer.view_listings');
});
Route::get('/blog', function () {
    return view('pages.blog');
});

// ------------------------ADMIN---------------------------
Route::get('/admin', 'HomeController@index')->middleware('can:adminGate');

// Reports

Route::get('/admin/reports', function () {
    return view('pages.admin.admin_reports');
})->middleware('can:adminGate');

Route::get('/agents/reports', function () {
    return view('pages.agent.agents_reports');
})->middleware('can:agentGate');

// Listings

Route::get('/admin/listings', function () {
    return view('pages.admin.admin_listings');
})->middleware('can:adminGate');

Route::get('/admin/listings/create', function () {
    return view('pages.admin.admin_listings_create');
})->middleware('can:adminGate');

// Agents

Route::get('/admin/agents', function () {
    return view('pages.admin.admin_agents');
})->middleware('can:adminGate');

Route::get('/admin/agents/create', function () {
    return view('pages.admin.admin_agents_create');
})->middleware('can:adminGate');

// Blog
/*
Route::get('/admin/blog', function () {
    return view('pages.admin.admin_blog');
});
*/


Route::Resource('/admin/messages', 'MessageController')->middleware('can:adminGate');
Route::get('/admin/messages/udpate/{id}', 'MessageController@read' )->name('messages.read')->middleware('can:adminGate');
Route::post('/message', 'MessageController@store' )->name('message.store_client');

Route::Resource('/admin/blog','BlogPostController')->middleware('can:adminGate');


Route::get('/blog', 'BlogPostController@index_client' );
Route::get('/blog/{id}', 'BlogPostController@show_client' )->name('blog.show_client');
Route::post('/blog/cat', 'BlogPostController@add_category' )->name('blog.add_category');

Route::Resource('/admin/listings','PropertyController')->middleware('can:adminGate');
Route::post('/admin/listings/cat', 'PropertyController@add_category' )->name('listings.add_category')->middleware('can:adminGate');


Route::get('/listings', 'PropertyController@index_client' );
Route::get('/listings/{id}', 'PropertyController@show_client' )->name('listings.show_client');

Auth::routes();

Route::resource('/admin/users', 'UsersController', ['except' => ['show','create','store']])->middleware('can:adminGate');

Route::Resource('/agents/listing','agentsPropertiesController')->middleware('can:agentGate');
Route::Resource('/agents/message', 'agentsMessagesController')->middleware('can:agentGate');
Route::get('/agents/message/udpate/{id}', 'agentsMessagesController@read' )->name('message.read')->middleware('can:agentGate');