<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testController;

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

Route::get('/', 'testController@login');
Route::get('forgot/{remail}', 'testController@forgot')->name('forgot');
Route::post('send_reset_email', 'testController@send_reset_email')->name('send_reset_email');
Route::post('reset/{remail}', 'testController@reset')->name('reset');


Route::group(['middleware'=>['checkAuth']], function(){

//Inside
//Route::get('home', 'testController@home')->name('home');

});


//Route::get('{anypath}', 'testController@home')->where('path', '.*');


Route::get('home', 'HomeController@home');//->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('social', 'HomeController@social')->name('social'); 
Route::get('radio', 'HomeController@radio')->name('radio');
Route::get('breakdown', 'HomeController@breakdown')->name('breakdown');


/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () { 
    Route::get('/login','adminController@login')->name('loginA');
    Route::get('/index_admin','adminController@index_admin')->name('index_admin');
    Route::get('/logoutA','adminController@logout')->name('logoutA');

        
        Route::get('/patient-list', 'adminController@patients')->name('patient-list');

       
        Route::get('/reports', 'adminController@reports')->name('reports');

         
         Route::post('/up_category', 'adminController@up_category')->name('up_category');
         Route::get('/del_category/{id}', 'adminController@del_category')->name('del_category');

        Route::get('/doctor-list', 'adminController@doctors')->name('doctor-list');

        Route::get('/users', 'adminController@users')->name('users');
         Route::post('/add_users', 'adminController@add_users')->name('add_users');
         Route::get('/del_users/{id}', 'adminController@del_users')->name('del_users');


         //Procedures
          Route::get('/procedures', 'adminController@procedures')->name('procedures');
          Route::post('/add_procedures', 'adminController@add_procedures')->name('add_procedures');
         Route::post('/up_procedure', 'adminController@up_procedure')->name('up_procedure');
         Route::get('/del_procedure/{id}', 'adminController@del_procedure')->name('del_procedure');

       //Treatment
        Route::get('/treatments', 'adminController@treatments')->name('treatments');
         Route::post('/add_treatment', 'adminController@add_treatment')->name('add_treatment');
         Route::post('/up_treatment', 'adminController@up_treatment')->name('up_treatment');
         Route::get('/del_treatment/{id}', 'adminController@del_treatment')->name('del_location');

         //Diseases
         
         Route::get('/diseases', 'adminController@diseases')->name('diseases');
         Route::post('/add_disease', 'adminController@add_disease')->name('add_disease');
         Route::post('/up_disease', 'adminController@up_disease')->name('up_disease');
         Route::get('/del_disease/{id}', 'adminController@del_disease')->name('del_disease');

     
        Route::post('/adminLogin', 'adminController@adminLogin')->name('adminLogin');
        Route::get('/reviews', function () {
        return view('admin.reviews');
        })->name('reviews');

    Route::get('forgot/{remail}', 'adminController@forgot')->name('forgot');
    Route::post('send_reset_email', 'adminController@send_reset_email')->name('send_reset_email');
    Route::post('reset/{remail}', 'adminController@reset')->name('reset');

      
       
        Route::get('/login', function () {
        return view('admin.login');
        })->name('loginA');
       
    });

Auth::routes();
Route::get('clear_cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});

//PUSHER
Route::post('message', 'HomeController@message');
