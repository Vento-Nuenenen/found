<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/overwatch', 'Backend\OverwatchController@index')->name('overwatch');

    Route::any('/users', 'Backend\UsersController@index')->name('users');
    Route::get('/users/add', 'Backend\UsersController@create')->name('add-users');
    Route::post('/users/store', 'Backend\UsersController@store')->name('store-users');
    Route::get('/users/edit/{uid}', 'Backend\UsersController@edit')->name('edit-users');
    Route::post('/users/update/{uid}', 'Backend\UsersController@update')->name('update-users');
    Route::get('/users/destroy/{uid}', 'Backend\UsersController@destroy')->name('destroy-users');

    Route::any('/groups', 'Backend\GroupsController@index')->name('groups');
    Route::get('/groups/add', 'Backend\GroupsController@create')->name('add-groups');
    Route::post('/groups/store', 'Backend\GroupsController@store')->name('store-groups');
    Route::get('/groups/edit/{gid}', 'Backend\GroupsController@edit')->name('edit-groups');
    Route::post('/groups/update/{gid}', 'Backend\GroupsController@update')->name('update-groups');
    Route::get('/groups/destroy/{gid}', 'Backend\GroupsController@destroy')->name('destroy-groups');

    Route::any('/events', 'Backend\EventsController@index')->name('events');
    Route::get('/events/add', 'Backend\EventsController@create')->name('add-events');
    Route::post('/events/store', 'Backend\EventsController@store')->name('store-events');
    Route::get('/events/edit/{eid}', 'Backend\EventsController@edit')->name('edit-events');
    Route::post('/events/update/{eid}', 'Backend\EventsController@update')->name('update-events');
    Route::get('/events/destroy/{eid}', 'Backend\EventsController@destroy')->name('destroy-events');

    Route::any('/items', 'Backend\ItemsController@index')->name('items');
    Route::get('/items/add', 'Backend\ItemsController@create')->name('add-items');
    Route::post('/items/store', 'Backend\ItemsController@store')->name('store-items');
    Route::get('/items/edit/{iid}', 'Backend\ItemsController@edit')->name('edit-items');
    Route::post('/items/update/{iid}', 'Backend\ItemsController@update')->name('update-items');
    Route::get('/items/destroy/{iid}', 'Backend\ItemsController@destroy')->name('destroy-items');

    Route::any('/claims', 'Backend\ClaimedController@index')->name('claims');
    Route::any('/claims/show/{cid}', 'Backend\ClaimedController@show')->name('show-claims');
    Route::any('/claims/update/{cid}', 'Backend\ClaimedController@update')->name('update-claims');
    Route::get('/claims/destroy/{cid}', 'Backend\ClaimedController@destroy')->name('destroy-claims');

    Route::resource('profile', 'Backend\ProfileController')->only('index', 'update');
});

Route::get('/', 'Frontend\FoundController@index')->name('found');
Route::get('/found/{iid}', 'Frontend\FoundController@show')->name('show-found');
Route::post('/found/{iid}/claim', 'Frontend\FoundController@claim')->name('claim-found');

Route::get('/sell', 'Frontend\SellController@index')->name('sell');
Route::get('/sell/{iid}', 'Frontend\SellController@show')->name('show-sell');
Route::post('/sell/{iid}/claim', 'Frontend\SellController@claim')->name('claim-sell');
