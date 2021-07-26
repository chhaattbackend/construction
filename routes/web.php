<?php

use App\Http\Controllers\StoreProductController;
use App\StoreProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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


// Route::get('addWatermark', function()
// {

//     $img = Image::make(public_path('images/123.PNG'));

//     /* insert watermark at bottom-right corner with 10px offset */
//     $img->insert(public_path('images/1613475579.JPG'), 'bottom-right', 10, 10);

//     $img->save(public_path('images/123123123123.png'));

//     //  $img_new = file_get_contents('images/123123123123.png');
//      $file= Image::make(public_path('images/123123123123.PNG'));



//     //  $img_new->storeAs('construction', 'hello.png', 's3');
//     $image = Image::make($file)->resize(400,300)->encode('png');
//     $path = Storage::disk('s3')->put('construction/', (string)$image);
//     //$s3->put('construction/', file_get_contents($img_new));
//     dd('saved image successfully.');
// });

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
    Route::resource('productimages' ,'ProductImageController');
    Route::get('productimages/delete/{id}', 'ProductImageController@destroy')->name('productimages.delete');
    Route::resource('productattributes', 'ProductAttributeController');
    Route::resource('productdetails', 'ProductDetailController');
    Route::resource('productreviews', 'ProductReviewController');
    Route::resource('stores', 'StoreController');
    Route::resource('userservices', 'UserServiceController');
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

/////////////////////////////////////////////////////////
Route::get('/attributelists/{id}','ProductAttributeController@attributelist')->name('attribute.list');
Route::post('/storeattributelists/{product:id}','ProductAttributeController@attributelistStore')->name('attribute.list.store');
Route::get('/attributeassign/{product:id}','ProductAttributeController@attributeAssign')->name('attribute.assign');
/////////////////////////////////////////////////////////
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
