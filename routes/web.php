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

Route::get('/', function () {
	if(Auth::check())
	{
    return redirect('/dashboard');
	}		
	else
	{	
    return view('auth.login');
	}
});

Route::get('/add','StudentController@create');

Route::post('/store','StudentController@store');

Route::get('/delete/{id}','StudentController@destroy');

Route::get('/edit/{id}','StudentController@edit');

Route::post('/update','StudentController@update');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
