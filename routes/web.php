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

// admin

// Grouping the admin functionality

Route::group(['prefix' => 'admin' , 'middleware' => 'admin'], function() {

//---------------Admin home

Route::get('/' , function(){
  return view('admin.welcome');
})->name('admin');

//---------------Projects

  Route::get('/projects' , 'ProjectController@showForm')->name('projects.showForm');
  Route::post('/projects/store' , 'ProjectController@store')->name('projects.store');
  Route::get('/projects/{id}/delete', 'ProjectController@delete')->name('projects.delete');
  Route::get('/projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
  Route::post('/projects/{id}/update' , 'ProjectController@update')->name('projects.update');

  //--------------tags

  Route::get('/tags' , 'TagController@showAll')->name('tags.all');
  Route::post('/tags/store' , 'TagController@store')->name('tags.store');
  Route::get('/tags/{id}/edit' , 'TagController@edit')->name('tags.edit');
  Route::get('/tags/{id}/delete' , 'TagController@delete')->name('tags.delete');
  Route::post('/tags/{id}/update' , 'TagController@update')->name('tags.update');

  //-------------Images

  Route::get('/images' , 'ImageController@showAll')->name('images.all');
  Route::post('/images/store' , 'ImageController@store')->name('images.store');
  Route::get('/images/{id}/edit', 'ImageController@edit')->name('images.edit');
  Route::post('/images/{id}/update', 'ImageController@update')->name('images.update');
  Route::get('/images/{id}/delete' , 'ImageController@delete')->name('images.delete');

  //------------Users

  Route::get('/users' , 'UserController@showAll')->name('users.all');
  Route::post('/users/store' , 'UserController@store')->name('users.store');
  Route::get('/users/{id}/edit' , 'UserController@edit')->name('users.edit');
  Route::post('/users/{id}/update' , 'UserController@update')->name('users.update');
  Route::get('/users/{id}/delete' , 'UserController@delete')->name('users.delete');

  //-----------Exports

  Route::get('/export' , 'ExportController@index')->name('export');
  Route::get('/export/image' , 'ExportController@exportImage')->name('export.image');
  Route::get('/export/project' , 'ExportController@exportProject')->name('export.project');
  Route::get('/export/tag' , 'ExportController@exportTag')->name('export.tag');
  Route::get('/export/user' , 'ExportController@exportUser')->name('export.user');

});

Route::get('/project/{id}' , 'ProjectController@single')->name('project');

Route::post('/comments/{project_id}/store' , 'CommentController@store')->name('comments.store')->middleware('auth');
Route::get('comments/{id}/delete' , 'CommentController@delete')->name('comments.delete')->middleware('admin');

//-----------Registered user routes

Route::get('user/account', 'UserController@account')->name('user.account')->middleware('auth');
Route::post('user/edited', 'UserController@edited')->name('user.edited')->middleware('auth');

//-----------Home view

Route::get('/', function () {
    return view('welcome')->with('Projects', App\Project::all());
})->name('welcome');

//-------------------------

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
