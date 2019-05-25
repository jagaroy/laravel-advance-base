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
// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
use App\Events\TaskEvent;
Route::get('/event', function(){
	return event(new TaskEvent('The Event is listened!'));
});

Route::get('/dashboard', function () {
	if (Auth::check()) {
		$user_count = DB::table('users')->count();
	    $admins_count = DB::table('admins')->count();    
	    return view('client.dashboard', compact('user_count', 'admins_count'));
	}else{
		return redirect('/login');
	}	
});
//default
Route::get('/', function () {
		$user_count = DB::table('users')->count();
	    $admins_count = DB::table('admins')->count();
	    return view('client.dashboard', compact('user_count', 'admins_count'));
});
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('/home', 'HomeController@index');

Route::get('/sendbasicmail', 'MailingController@basic_email');
Route::get('sendhtmlemail','MailingController@html_email');
Route::get('sendattachmentemail','MailingController@attachment_email');

Route::get('pdf','PdfController@index');

Auth::routes();

Route::get('notification-send', function(){
	auth()->user()->notify( (new \App\Notifications\HelloNotification)->locale('bn') );
})->middleware('auth:user');

Route::prefix('admin')->group(function () {
  // Route::get('/', 'AdminController@index')->name('admin.dashboard');
	
	Route::get('/change/{user}', ['as'=>'admins.edit', 'uses'=>'AdminController@edit'])->middleware('auth:admin');
	Route::patch('/{admin}/update', ['as'=>'admins.update', 'uses'=>'AdminController@update'])->middleware('auth:admin');

	Route::get('/', function () {
			$user_count = DB::table('users')->count();
		    $category_count = DB::table('categories')->count();    
		    return view('dashboard.dashboard', compact('user_count', 'category_count'));
	})->middleware('auth:admin');
	// Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::get('/dashboard', function () {

		$user_count = DB::table('users')->count();
	    $category_count = DB::table('categories')->count();    
	    return view('dashboard.dashboard', compact('user_count', 'category_count'));
	})->middleware('auth:admin');
	Route::get('register', 'AdminController@create')->name('admin.register');
	Route::post('register', 'AdminController@store')->name('admin.register.store');
	Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

	// Route::resource('/categories', 'CategoryController');

});