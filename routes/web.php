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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {

Route::get('/member/search', 'App\Http\Controllers\AdminMembersController@search')->name('search');
Route::get('/member/create', 'App\Http\Controllers\AdminMembersController@create')->name('create');
Route::post('/member', 'App\Http\Controllers\AdminMembersController@store')->name('store');
Route::get('/member/index', 'App\Http\Controllers\AdminMembersController@index')->name('index');
Route::get('/member/edit/{id}', 'App\Http\Controllers\AdminMembersController@edit')->name('edit');
Route::get('/member/update', 'App\Http\Controllers\AdminMembersController@update')->name('update');
Route::get('/member/delete/{id}', 'App\Http\Controllers\AdminMembersController@destroy')->name('delete');


Route::get('/project/create', 'App\Http\Controllers\AdminProjectsController@create')->name('createproj');
Route::post('/project', 'App\Http\Controllers\AdminProjectsController@store')->name('storeproj');
Route::get('/project/index', 'App\Http\Controllers\AdminProjectsController@index')->name('indexproj');
Route::get('/project/edit/{id}', 'App\Http\Controllers\AdminProjectsController@edit')->name('projedit');
Route::get('/project/update', 'App\Http\Controllers\AdminProjectsController@update')->name('projupdate');
Route::get('project/delete/{id}', 'App\Http\Controllers\AdminProjectsController@destroy')->name('projdelete');

Route::get('/task/create', 'App\Http\Controllers\AdminTasksController@create')->name('tasks');
Route::post('/task', 'App\Http\Controllers\AdminTasksController@store')->name('storetask');
Route::get('/task/index', 'App\Http\Controllers\AdminTasksController@index')->name('indextask');
Route::get('/task/edit/{id}', 'App\Http\Controllers\AdminTasksController@edit')->name('edittask');
Route::get('/task/update', 'App\Http\Controllers\AdminTasksController@update')->name('updatetask');
Route::get('/task/delete/{id}', 'App\Http\Controllers\AdminTasksController@destroy')->name('deletetask');

Route::get('/category/create', 'App\Http\Controllers\AdminCategoriesController@create')->name('categories');
Route::post('/category', 'App\Http\Controllers\AdminCategoriesController@store')->name('storecategory');
Route::get('/category/index', 'App\Http\Controllers\AdminCategoriesController@index')->name('indexcategory');
Route::get('/category/edit/{id}', 'App\Http\Controllers\AdminCategoriesController@edit')->name('editcateg');
Route::get('/category/update', 'App\Http\Controllers\AdminCategoriesController@update')->name('updatecateg');
Route::get('/category/delete/{id}', 'App\Http\Controllers\AdminCategoriesController@destroy')->name('deletecateg');

Route::get('/dashboard', 'App\Http\Controllers\AdminDashboardsController@index')->name('dashboards');

Route::get('/user', 'App\Http\Controllers\UsersController@index')->name('users');
Route::get('/user/dashboard', 'App\Http\Controllers\UsersDashboardController@index')->name('userdashboard');
Route::get('/user/project', 'App\Http\Controllers\UsersProjectsController@index')->name('userproject');
Route::get('/user/project/{project}', 'App\Http\Controllers\UsersProjectsController@show')->name('showdetail');
Route::get('/user/project/{project}/{user}', 'App\Http\Controllers\UsersProjectsController@teamMemberDetail')->name('teamdetail');

Route::get('/user/team', 'App\Http\Controllers\TeamMembersController@index')->name('team');
Route::get('/user/pending/task', 'App\Http\Controllers\PendingController@index')->name('pending');
Route::get('/user/onprogress/task', 'App\Http\Controllers\OnProgressController@index')->name('onprogress');
Route::get('/user/completed/task', 'App\Http\Controllers\CompletedController@index')->name('completed');
Route::get('/user/alltask', 'App\Http\Controllers\UserTasksController@index')->name('alltask');

Route::get('/totalteam/dashboard', "App\Http\Controllers\TotalTeamController@index")->name('totalteam');
Route::get('/status/edit/{id}', 'App\Http\Controllers\UserPendingStatusController@edit')->name('edittaskstatus');
Route::get('/status/update/{id}', 'App\Http\Controllers\UserTasksController@update')->name('updatetaskstatus');

Route::get('onprogress/edit/{id}', 'App\Http\Controllers\UserOnProgressStatusController@edit')->name('onprogressedit');
Route::get('onprogress/update/{id}', 'App\Http\Controllers\UserTasksController@toOnProgress')->name('onprogressupdate');

Route::get('completed/edit/{id}', 'App\Http\Controllers\UserCompletedStatusController@edit')->name('editcompletedstatus');
Route::get('completed/update/{id}', 'App\Http\Controllers\UserTasksController@toCompleted')->name('updatecompletedstatus');

Route::get('/notification', 'App\Http\Controllers\AdminNotificationController@index')->name('notify');
Route::get('/task/expiringTasks', 'App\Http\Controllers\AdminTasksController@expiringTasks')->name('expiringTasks');
Route::get('/user/expiring', 'App\Http\Controllers\UserTasksController@expiring')->name('expiring');

});
