<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Localidad', 'LocalidadController@index');

Route::get('TipoMaquinaria/{idLocalidad}', 'TipoMaquinariaController@show');

Route::get('Products/{idLocalidad}/{idTipomaquinaria}', 'MaquinariaController@show');

Route::post('Cart', 'MaquinariaController@getMaquinaria');

Route::post('SaveCart','SolicitudController@Store');


/*
Route::group(['middleware' => 'jwt.auth'], function ($router) {
    
    
    //Route::post('customers/new', 'CustomersController@new');
});
*/