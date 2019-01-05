<?php

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('public/login', 'PublicController@login')->name('login');
	Route::post('public/check', 'PublicController@check');
	Route::get('public/logout', 'PublicController@logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'checkrbac'], 'namespace' => 'Admin'], function () {

	Route::get('index/index', 'IndexController@index');
	Route::get('index/welcome', 'IndexController@welcome');

	Route::get('manager/index', 'ManagerController@index');

	Route::get('auth/index', 'AuthController@index');
	Route::any('auth/add', 'AuthController@add');

	Route::get('role/index', 'RoleController@index');
	Route::any('role/assign', 'RoleController@assign');

	Route::get('member/index', 'MemberController@index');
	Route::any('member/add', 'MemberController@add');

	Route::get('periodical/index', 'PeriodicalController@index');
	Route::any('periodical/add', 'PeriodicalController@add');

	Route::get('periodicalCategory/index', 'PeriodicalCategoryController@index');
	Route::any('periodicalCategory/add', 'PeriodicalCategoryController@add');
	Route::any('periodicalCategory/edit', 'PeriodicalCategoryController@edit');

	Route::post('upload/image', 'UploaderController@uploadImage');
	Route::post('upload/file', 'UploaderController@uploadFile');
});