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

Route::get('/','UserController@index')->name('get');

Route::name('admin.')->middleware('auth')->group(function ()
{
    Route::resource('brands', BrandController::class);

    Route::resource('lines', LineController::class);

    Route::get('countries/{country}/users', 'CountryController@showUsers')->name('countries.show.users');
    Route::get('countries/{country}/products', 'CountryController@showProducts')->name('countries.show.products');
    Route::get('countries/{country}/brands', 'CountryController@showBrands')->name('countries.show.brands');
    Route::resource('countries', CountryController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('indications', IndicationController::class);
    
    Route::post('ingredients/add_ajax', 'IngredientController@addAjaxIngredient')->name('ingredients.add.ajax');
    Route::get('ingredients/get_ajax', 'IngredientController@getAjaxIngredient')->name('ingredients.get.ajax');
    Route::resource('ingredients', IngredientController::class);
    
    Route::resource('forms', FormController::class);
    
    Route::post('products/{brand}/lines', 'ProductController@showlines')->name('products.show.lines');
    Route::resource('products', ProductController::class);
});



require __DIR__.'/auth.php';
