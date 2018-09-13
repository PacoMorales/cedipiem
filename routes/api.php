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

Route::post('padrino/nuevo-padrino/app','PRE_ALTA_Controller@nuevoPadrinoAPP')->name('padrino.nuevo-app');
Route::post('padrino/nuevo-padrino/iniciativa-privada/app','PRE_ALTA_Controller@nuevoPadrinoIPAPP')->name('padrino.nuevo-ip-app');

Route::get('padrino/municipios','PRE_ALTA_Controller@apiMunicipios')->name('padrino.municipios');
Route::get('padrino/sectores','PRE_ALTA_Controller@apiSectores')->name('padrino.sectores');
Route::get('padrino/sectores/estructuras/{id}','PRE_ALTA_Controller@apiEstructura')->name('padrino.estructuras');
Route::get('padrino/sectores/estructuras/dependencia/{id}','PRE_ALTA_Controller@apiDependencia')->name('padrino.dependencia');