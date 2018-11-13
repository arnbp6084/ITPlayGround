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

//UI route
Auth::routes();
Route::get('/',['uses' => 'HomeController@gethome', 'as' => 'homefirst']);
Route::get('/validte', 'HomeController@index')->name('validte');
Route::get('/home', 'HomeController@gethome')->name('home');
Route::resource('content', 'ContentController');
Route::resource('courses', 'CoursesController');
Route::resource('profile', 'ProfileController');

Route::resource('business', 'BusinessController');

Route::post('/myprofile/passwordchange', 'ProfileController@passwordchange')->name('formSubmit');
Route::post('/enroll', 'CoursesController@enrollyou')->name('enrollYou');
Route::post('/contactus', 'HomeController@contactus')->name('contactus');

//admin
Route::get('/manage',['uses' => 'admin\AdminController@index', 'as' => 'adminhomefirst']);
Route::get('/adminhome', 'admin\AdminController@gethome')->name('adminhome');
Route::post('adminlogin', array(
	'uses' => 'admin\AdminController@doLogin'
))->name('adminlogin');
Route::post('adminlogout', array(
	'uses' => 'admin\AdminController@doLogout'
))->name('adminlogout');
Route::resource('adminproject', 'admin\ProjectController');
Route::post('/adminprojectsts', 'admin\ProjectController@statuschange');
Route::resource('admincontent', 'admin\ContentController');
Route::post('/admincontentsts', 'admin\ContentController@statuschange');
Route::resource('adminuser', 'admin\UserController');
Route::post('/adminusersts', 'admin\UserController@statuschange');
Route::get('/adminenroll', 'admin\ProjectController@enroll');

Route::resource('adminprofile', 'admin\ProfileController');
Route::post('/adminprofile/passwordchange', 'admin\ProfileController@passwordchange')->name('adminProfileSubmit');

Route::get('/admincontact', 'admin\AdminController@contactus');

Route::get('/adminbusiness', 'admin\BusinessController@business');

Route::resource('adminslider', 'admin\SliderController');
Route::post('/adminslidersts', 'admin\SliderController@statuschange');



/*Route::get('/manage', function () {
    return view('admin.pages.home');
});*/
//Route::get('/adminvalidte', 'AdminController@index')->name('adminvalidte');

//Route::get('/', 'HomeController@index');
/*Route::get('/', function()
{
   return view('welcome');
});
Route::get('about', function()
{
   return View::make('pages.contact');
});*/

/*Route::get('/about', 'ContentController@about')->name('about');
Route::get('/contact', 'ContentController@contact')->name('contact');
Route::get('/services', 'ContentController@services')->name('services');
Route::get('/works', 'ContentController@works')->name('works');*/

/*Route::get('/courses/phpmsql', 'CoursesController@php')->name('phpmysql');
Route::get('/courses/codeigneitor', 'CoursesController@codeigneitor')->name('codeigneitor');
Route::get('/courses/laravel', 'CoursesController@laravel')->name('laravel');
Route::get('/courses/git', 'CoursesController@git')->name('git');
*/
//Route::get('/profile/{id}', 'ProfileController@index');



