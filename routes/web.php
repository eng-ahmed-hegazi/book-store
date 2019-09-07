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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware' =>'admin:admin'],function (){
    Route::resource('books','BooksController');
    Route::resource('categories','CategoriesController');
    Route::resource('tags','TagsController');
    Route::resource('users','UsersController');
    Route::resource('subcategories','SubcategoriesController');
    Route::get('/settings','SettingsController@index')->name('settings.index');
    // Settings Routes
    Route::get('/settings','SettingsController@index')->name('settings.index');
    Route::post('/settings/update','SettingsController@update')->name('settings.update');
    // user and profile
    Route::get('/users/admin/{id}','UsersController@admin')->name('user.admin');/*->middleware('admin');*/
    Route::get('/users/notadmin/{id}','UsersController@notadmin')->name('user.notadmin');
    Route::get('/profile','ProfilesController@index')->name('user.profile');
    Route::post('/users/profile/update','ProfilesController@update')->name('user.profile.update');
    Route::get('/users/profile/create','ProfilesController@create')->name('user.profile.create');
    Route::post('/users/profile/store','ProfilesController@store')->name('user.profile.store');
    Route::post('logout', 'AdminController@logout')->name('admin.logout');
});
Route::group(['middleware' =>'auth'],function () {
    Route::get('/profile', 'FrontEndController@profilecreate')->name('profile.create');
    Route::post('/profile', 'FrontEndController@updateprofile')->name('user.profile.update');
    Route::post('/add/{id}', 'FrontEndController@addComment')->name('comment.add');
});

Route::get('admin/login', 'AdminController@create')->name('admin.index');
Route::post('admin/login', 'AdminController@store')->name('admin.login');

Route::group(['prefix' => LaravelLocalization::setLocale()],function (){
    // Front-End Roues
    Route::get('/', 'FrontEndController@index')->name('index.index');
    Route::get('/book/{slug}', 'FrontEndController@singleBook')->name('book.single');
    Route::get('/category/{id}', 'FrontEndController@category')->name('category.single');
    Route::get('/tags/{id}', 'FrontEndController@tag')->name('tag.single');
    Route::post('/results', 'FrontEndController@search')->name('search.single');
    Route::get('/about','FrontEndController@about')->name('about');
    Route::get('/contact','FrontEndController@contact')->name('contact');
});
/* login | register */

// download route
Route::get('/download/{slug}', 'FrontEndController@download')->name('download.single');
// comment add


/*wild card*/
Route::get('/{path}', function (){
    return view('PageNotFound404');
})->where(['path' => '.*']);


