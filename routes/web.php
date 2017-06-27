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
Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/admin', function () {
    return view('admin');

});

*/
Route::get('/','VehicleController@dashboard');
Route::get('/admin', 'Specifications@index');
Route::get('/models','Specifications@getModels');

Route::get('/car/{request?}','VehicleController@index')->name('car');
Route::get('/editcar','VehicleController@findCarById');
Route::get('searchCars/{request?}','VehicleController@searchCars');

//Route::get('/car/{request?}','VehicleController@loadCars');




/*
Route::get('/car', function () {
    return view('vehicleform');
});
*/
Auth::routes();
Route::post('/brand/{id?}','Specifications@storeBrand')->name('brand');
Route::post('/model','Specifications@storeModel')->name('model');
Route::post('/engine','Specifications@storeEngine')->name('engine');
Route::post('/color','Specifications@storeColor')->name('color');
Route::post('/car','VehicleController@insert')->name('postCar');


/*Route::post('/brand',function(){
    return Request::get('brand');
})->name('brand');
*/
//Route::post('/brand', array('as'=>'brand','use'=>'Specifications@storeBrand'));
/*
Route::group(['prefix'=>'/admin'], function(){
    //Route::post('/brand', array('as'=>'brand','use'=>'Specifications@storeBrand'));
    Route::post('/model', array('as'=>'model','use'=>'Specifications@storeModel'));
    Route::post('/engine', array('as'=>'engine','use'=>'Specifications@storeEngine'));
    Route::post('/color', array('as'=>'color','use'=>'Specifications@storeColor'));
    Route::post('/price', array('as'=>'price','use'=>'Specifications@storePrice'));
    Route::get('/car', array('as'=>'car','use'=>'VehicleController@index'));

});
*/
/*
Route::get('/', 'Specifications@index');
*/