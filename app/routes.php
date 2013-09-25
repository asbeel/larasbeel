<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('before' => 'basicAuth', 'prefix' => 'dashboard'), function()
{
    Route::get('', array('as' => 'indexDashboard', 'uses' => 'Controllers\DashboardController@getIndex'));
    Route::get('logout', array('as' => 'logout', 'uses' => 'Controllers\DashboardController@getLogout'));
    Route::get('access-denied', array('as' => 'accessDenied', 'uses' => 'Controllers\DashboardController@getAccessDenied'));
});

Route::group(array('before' => 'basicAuth|hasPermissions', 'prefix' => 'dashboard'), function()
{
     // Users
    Route::get('users', array('as' => 'listUsers', 'uses' => 'Controllers\UserController@getIndex'));
    Route::delete('user/{userId}', array('as' => 'deleteUsers', 'uses' => 'Controllers\UserController@delete'));
    Route::post('user/new', array('as' => 'newUserPost', 'uses' => 'Controllers\UserController@postCreate'));
    Route::get('user/new', array('as' => 'newUser', 'uses' => 'Controllers\UserController@getCreate'));
    Route::get('user/{userId}', array('as' => 'showUser', 'uses' => 'Controllers\UserController@getShow'));
    Route::put('user/{userId}', array('as' => 'putUser', 'uses' => 'Controllers\UserController@putShow'));
    // Groups
    Route::get('groups', array('as' => 'listGroups', 'uses' => 'Controllers\GroupController@getIndex'));
    Route::post('group/new', array('as' => 'newGroupPost', 'uses' => 'Controllers\GroupController@postCreate'));
    Route::get('group/new', array('as' => 'newGroup', 'uses' => 'Controllers\GroupController@getCreate'));
    Route::delete('group/{groupId}', array('as' => 'deleteGroup', 'uses' => 'Controllers\GroupController@delete'));
    Route::get('group/{groupId}', array('as' => 'showGroup', 'uses' => 'Controllers\GroupController@getShow'));
    Route::put('group/{groupId}', array('as' => 'putGroup', 'uses' => 'Controllers\GroupController@putShow'));
    Route::delete('group/{groupId}/user/{userId}', array('as' => 'deleteUserGroup', 'uses' => 'Controllers\GroupController@deleteUserFromGroup'));
    Route::post('group/{groupId}/user/{userId}', array('as' => 'addUserGroup', 'uses' => 'Controllers\GroupController@addUserInGroup'));
    // Permissions
    Route::get('permissions', array('as' => 'listPermissions', 'uses' => 'Controllers\PermissionController@getIndex'));
    Route::delete('permission/{permissionId}', array('as' => 'deletePermission', 'uses' => 'Controllers\PermissionController@delete'));
    Route::get('permission/new', array('as' => 'newPermission', 'uses' => 'Controllers\PermissionController@getCreate'));
    Route::post('permission/new', array('as' => 'newPermissionPost', 'uses' => 'Controllers\PermissionController@postCreate'));
    Route::get('permission/{permissionId}', array('as' => 'showPermission', 'uses' => 'Controllers\PermissionController@getShow'));
    Route::put('permission/{permissionId}', array('as' => 'putPermission', 'uses' => 'Controllers\PermissionController@putShow'));
});

Route::group(array('before' => 'notAuth', 'prefix' => 'dashboard'), function()
{
    Route::get('login', array('as' => 'getLogin', 'uses' => 'Controllers\DashboardController@getLogin'));
    Route::post('login', array('as' => 'postLogin', 'uses' => 'Controllers\DashboardController@postLogin'));
});