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


/*
|---------------------------------------------------------
|LOAD VIEW
|---------------------------------------------------------
|JUST LOAD VIEWS
|
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('user', function () {
//     return view('header_footer/master');
// });
Route::get('dashboard', function () {
    return view('html/dashboard');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::view('/register', 'register');
Route::post('/store','RegisterController@store');


/*
|---------------------------------------------------------
|Categories  Related
|---------------------------------------------------------
|JUST Work only Categories
|
|
*/
    //Route::resource('categorie', 'CategorieController');
    // Route::get('category', function () {
    //     return view('html/category');
    // });
    Route::resource('/allcategorie','CategorieController');
    Route::get('/all/categorie','CategorieController@AllCategorie')->name('all.category');


    /*
|---------------------------------------------------------
|User  Related
|---------------------------------------------------------
|JUST Work only User
|
|
*/

Route::resource('/user', 'UserController');
Route::get('/user_data/json','UserController@User_json')->name('user_data.json');




/*
|---------------------------------------------------------
|Invoices  Related
|---------------------------------------------------------
|JUST Work only Invoices
|
|
*/
    //Route::resource('categorie', 'CategorieController');
    // Route::get('category', function () {
    //     return view('html/category');
    // });
    Route::resource('/po_invoices','InvoiceController');
    