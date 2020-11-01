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
    return view('website.frontend.layouts.main');
});
Route::get('/new-login', function () {
    return view('newlogin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','DashboardController@index')->name('dashbord.index');
Route::resource('/dashboard/product_category','ProductCategoryController');
Route::resource('/dashboard/product','ProductController');
Route::resource('/dashboard/productImage','ProductImageController');
Route::resource('/dashboard/customerDetail','CustomerDetailController');
Route::resource('/dashboard/payment','PaymentController');
Route::resource('/dashboard/contact','ProductImageController');
Route::resource('/dashboard/contactForm','ProductImageController');

