<?php

//Route::apiResource('/Localidad','LocalidadController');

//Route::apiResource('TipoMaquinaria','TipoMaquinariaController');


/*Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('spa/{vue_capture?}', function() {
    return view('spa');
 })->where('vue_capture', '[\/\w\.-]*');

*/

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');
 