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



    /*-----------------------------------------Authentication------------------------------------------*/

    Route::get('login','AuthController@showLoginForm');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    Route::get('register', 'AuthController@showRegisterForm');
    Route::get('/', 'HomeController@index')->name('home');

    /*-------------------------------------------------------------------------------------------------*/



    /*--------------------------------------------Products---------------------------------------------*/

    Route::middleware('auth')->group(function () {
        Route::any('search', 'SearchController@searchUser');
        Route::any('searchProduct', 'SearchController@searchProduct');
        Route::any('/sort','ProductController@sortName')->name('sortName');

    /*-------------------------------------------------------------------------------------------------*/



    /*----------------------------------------------Users----------------------------------------------*/

        Route::post('/add/newuser', "UsersController@creatUser")->name('add.user');
        Route::get('/createUsers', "UsersController@showCreateUser");
        Route::get('/main', "UsersController@ShowImageMain");
        Route::group(['prefix' => 'showAllUsers'], function (){
            Route::get('/', "UsersController@showAllUsers")->name('showallusers');
            Route::get('/{id}', "UsersController@usersId")->name('show');
            Route::post('/{id}/update', "UsersController@updateUser");
            Route::get('/user/{id}', "UsersController@deleteUser")->name('delete');
        });

    /*--------------------------------------------------------------------------------------------------*/



    /*---------------------------------------------Products---------------------------------------------*/

    Route::post('/add/newproducts', "ProductController@CreateProducts")->name('add.new');
    Route::get('/ProductsList', "ProductController@listAction");
    Route::group(['prefix' => 'showAllProducts'], function (){
        Route::get('/', "ProductController@showAllProducts")->name('showallproducts');
        Route::get('/{id}', "ProductController@productsId")->name('showproduct');
        Route::post('/{product}/update', "ProductController@updateProduct");
        Route::get('/product/{id}', "ProductController@deleteProduct")->name('deleteproducts');
    });


    /*--------------------------------------------------------------------------------------------------*/



    /*--------------------------------------------Categories--------------------------------------------*/

    Route::post('/add/newcategory', "CategoryController@CreateCategory")->name('add.category');
    Route::get('/categoryList', "CategoryController@manyAction");
    Route::group(['prefix' => 'showAllCategories'], function () {
        Route::get('/', "CategoryController@showAllCategories")->name('showallcategories');
        Route::get('/{id}', "CategoryController@categoriesId")->name('showcategory');
        Route::post('/{id}/update', "CategoryController@updateCategory");
        Route::get('/category/{id}', "CategoryController@deleteCategory")->name('deletecategory');
    });
    /*-------------------------------------------------------------------------------------------------*/



    /*----------------------------------------------Other----------------------------------------------*/
    Route::get('/main', "MainController@index");
    Route::post('logout', 'AuthController@logout')->name('logout');
        Route::get('lang/{locale}', function ($locale){
            session()->put('locale', $locale);
            return redirect()->back();
        });

});



//Route::get('/test', "UsersController@test");
