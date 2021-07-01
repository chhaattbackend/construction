<?php

use App\Http\Controllers\StoreProductController;
use App\StoreProduct;
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
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    // return view('welcome');

    return redirect('/acategories');
});

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/ag', 'StoreProductController@index2')->name('ag');
    Route::resource('attributes', 'AttributeController');
    Route::resource('brands', 'BrandController');
    Route::resource('customers', 'CustomerController');
    Route::resource('acategories', 'ACategoryController');
    Route::resource('bcategories', 'BCategoryController');
    Route::resource('ccategories', 'CCategoryController');
    Route::resource('dcategories', 'DCategoryController');
    Route::resource('ecategories', 'ECategoryController');
    Route::resource('fcategories', 'FCategoryController');
    Route::resource('areaones', 'AreaOneController');
    Route::resource('areatwos', 'AreaTwoController');
    Route::resource('areathrees', 'AreaThreeController');
    Route::post('storeproducts/ajax' , 'StoreProductController@ajax');
    Route::resource('cities', 'CityController');
    Route::resource('countries', 'CountryController');
    Route::resource('products', 'ProductController');
    Route::resource('productattributes', 'ProductAttributeController');
    Route::resource('productdetails', 'ProductDetailController');
    Route::resource('productreviews', 'ProductReviewController');
    Route::resource('stores', 'StoreController');
    Route::resource('storeservices', 'StoreServiceController');
    Route::resource('storeproducts', 'StoreProductController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('services', 'ServiceController');
    Route::resource('servicetypes', 'ServiceTypeController');
    Route::resource('units', 'UnitController');
    Route::resource('user', 'UserController');
    Route::resource('users', 'UserController');

    // Route::post('/dp','UserController@userprofile');
    Route::post('saveimage', 'UserController@save_image');
    Route::get('stor', 'StoreProductController@prsonal')->name('stor.personal');
    Route::get('/productview','StoreProductController@productview')->name('store.productview');
    Route::get('productview/{id}', 'StoreProductController@product')->name('store.product');
    Route::get('inner/{id}', 'StoreProductController@inner')->name('inner.personal');
    Route::post('save', 'StoreProductController@save')->name('inner.save');
    // Route::post('inner/asdad/ajax', 'StoreProductController@ajax')->name('ajax');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
