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
	Route::get('manager/add', 'ManagerController@add');
	Route::post('manager/doAdd', 'ManagerController@doAdd');
	Route::get('manager/edit/{id}', 'ManagerController@edit')->where('id','[0-9]+');
	Route::post('manager/doEdit', 'ManagerController@doEdit');
	Route::get('manager/statusOn/{id}', 'ManagerController@statusOn')->where('id','[0-9]+');
	Route::get('manager/statusOff/{id}', 'ManagerController@statusOff')->where('id','[0-9]+');
	Route::get('manager/delete/{id}', 'ManagerController@delete')->where('id','[0-9]+');

	Route::get('auth/index', 'AuthController@index');
	Route::any('auth/add', 'AuthController@add');
	Route::get('auth/edit/{id}', 'AuthController@edit')->where('id','[0-9]+');
	Route::get('auth/delete/{id}', 'AuthController@delete');

	Route::get('role/index', 'RoleController@index');
	Route::any('role/assign', 'RoleController@assign');
	Route::any('role/add', 'RoleController@add');
	Route::get('role/edit', 'RoleController@edit');

	Route::get('member/index', 'MemberController@index');
	Route::any('member/add', 'MemberController@add');

	Route::get('periodical/index', 'PeriodicalController@index');
	Route::any('periodical/add', 'PeriodicalController@add');
	Route::get('periodical/edit/{id}', 'PeriodicalController@edit')->where('id','[0-9]+');
	Route::get('periodical/detail/{id}', 'PeriodicalController@detail')->where('id','[0-9]+');
	Route::post('periodical/doedit', 'PeriodicalController@doedit');
	Route::get('periodical/statusOn/{id}', 'PeriodicalController@statusOn')->where('id','[0-9]+');
	Route::get('periodical/statusOff/{id}', 'PeriodicalController@statusOff')->where('id','[0-9]+');
	Route::get('periodical/delete/{id}', 'PeriodicalController@delete')->where('id','[0-9]+');

	Route::get('periodicalCategory/index', 'PeriodicalCategoryController@index');
	Route::any('periodicalCategory/add', 'PeriodicalCategoryController@add');
	Route::any('periodicalCategory/edit/{id}', 'PeriodicalCategoryController@edit')->where('id','[0-9]+');
	Route::post('periodicalCategory/stop/{id}', 'PeriodicalCategoryController@stop')->where('id','[0-9]+');
	Route::post('periodicalCategory/start/{id}', 'PeriodicalCategoryController@start')->where('id','[0-9]+');
	Route::post('periodicalCategory/delete/{id}', 'PeriodicalCategoryController@delete')->where('id','[0-9]+');
	Route::post('periodicalCategory/update/{id}', 'PeriodicalCategoryController@update')->where('id','[0-9]+');

	Route::post('upload/image', 'UploaderController@uploadImage');
	Route::post('upload/file', 'UploaderController@uploadFile');
	Route::post('upload/test', 'UploaderController@test');

	Route::get('periodicalDoc/index', 'PeriodicalDocController@index');
	Route::get('periodicalDoc/search', 'PeriodicalDocController@search');
	Route::get('periodicalDoc/add/{id}', 'PeriodicalDocController@add')->where('id', '[0-9]+');
	Route::get('periodicalDoc/download/{id}', 'PeriodicalDocController@download')->where('id', '[0-9]+');
	Route::post('periodicalDoc/doAdd', 'PeriodicalDocController@doAdd');
	Route::get('periodicalDoc/read/{id}', 'PeriodicalDocController@read')->where('id', '[0-9]+');
	Route::get('periodicalDoc/realDownload/{id}', 'PeriodicalDocController@realDownload')->where('id', '[0-9]+');

	Route::get('periodicalPaper/index', 'PeriodicalPaperController@index');
	Route::get('periodicalPaper/phase/{id}', 'PeriodicalPaperController@phase')->where('id', '[0-9]+');
	Route::get('periodicalPaper/add/{id}', 'PeriodicalPaperController@add')->where('id', '[0-9]+');
	Route::post('periodicalPaper/doAdd', 'PeriodicalPaperController@doAdd');

	Route::get('system', 'SystemController@index');
	Route::post('system/add', 'SystemController@add');

	// Route::get('periodicalPreview/index', 'PaperPreview@index');
	// Route::get('periodicalPreview/add', 'PaperPreview@add');
	// Route::post('periodicalPreview/doAdd', 'PaperPreview@doAdd');
	// Route::get('perioddicalPreview/edit/{id}', 'PaperPreview@edit')->where('id', '[0-9]+');
	// Route::post('periodicalPreview/delete/{id}', 'PaperPreview@delete')->where('id', '[0-9]+');

	Route::get('periodicalPaperPreview/index', 'PeriodicalPaperPreviewController@index');
	Route::get('periodicalPaperPreview/phase/{id}', 'PeriodicalPaperPreviewController@phase')->where('id', '[0-9]+');
	Route::get('periodicalPaperPreview/catalog/{id}/{year}/{phase}', 'PeriodicalPaperPreviewController@catalog')->where('id', '[0-9]+')->where('year', '[0-9]+')->where('phase', '[0-9]+');
	Route::post('periodicalPaperPreview/index', 'PeriodicalPaperPreviewController@add');

	Route::post('check/adminname','CheckFieldController@checkName');
	Route::post('check/rolename','CheckFieldController@checkRoleName');
	Route::post('check/periodicalCategory','CheckFieldController@checkCategoryName');
});

Route::group(['namespace' => 'Home'], function () {
	Route::get('/', 'IndexController@index');
    Route::get('index'.config('myroute.suffix','html'), 'IndexController@index');
	Route::get('account/login'.config('myroute.suffix','html'), 'AccountController@login')->name('memberlogin');
	Route::post('account/doLogin', 'AccountController@check');
	Route::get('account/logout', 'AccountController@logout');
	Route::get('account/register'.config('myroute.suffix','html'), 'AccountController@register');
	Route::post('account/doRegister', 'AccountController@doRegister');
	Route::get('account/findpwd/vertify'.config('myroute.suffix','html'), 'AccountController@vertify');
	Route::get('account/findpwd/set'.config('myroute.suffix','html'), 'AccountController@set');
	Route::get('account/findpwd/complete'.config('myroute.suffix','html'), 'AccountController@complete');

	Route::get('journal'.config('myroute.suffix','html'), 'JournalController@index');
	Route::get('journal/category/{id}'.config('myroute.suffix','html'), 'JournalController@category')->where('id','[0-9]+');
	Route::get('journal/{id}'.config('myroute.suffix','html'), 'JournalController@detail')->where('id', '[0-9]+');

	Route::get('search/{key}', 'SearchController@search');

	Route::get('paper/{id}'.config('myroute.suffix','html'), 'PaperController@index')->where('id', '[0-9A-Za-z]+');
    Route::get('catalog','PaperController@catalog');

	Route::get('aboutus'.config('myroute.suffix','html'), function () {
		return view('home/public/aboutus');
	});

});

Route::group(['namespace' => 'Home','middleware'=>['auth:member']], function () {
	Route::get('usercenter/collection'.config('myroute.suffix','html'), 'UserController@collection');
	Route::post('usercenter/collection', 'PaperCollectionController@collection');
	Route::post('usercenter/unCollection', 'PaperCollectionController@unCollection');
	Route::post('usercenter/removeCollected', 'PaperCollectionController@removeCollected');

	Route::get('downpaper/{id}','PaperController@download');
});