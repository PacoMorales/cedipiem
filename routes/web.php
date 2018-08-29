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
    return view('cedipiem.usuario.login.registro');
});

	Route::group(['prefix' => 'sedesem'], function(){
		Route::get('/dependencias/{$id}','METADATO_PADRINOS_Controller@selectDependencia')->name('padrino.obtdep');
		Route::get('padrino/estructura/{id}','METADATO_PADRINOS_Controller@selectEstructura')->name('padrino.est');
		Route::get('padrino/mantenimiento/','METADATO_PADRINOS_Controller@generarTabla')->name('padrino.ver');
		Route::get('padrino/{id}/inhabilitar','METADATO_PADRINOS_Controller@inhabilitarRegistro')->name('padrino.borrar');
		Route::get('padrino/nuevo-padrino/elige-sector','METADATO_PADRINOS_Controller@eligeSector')->name('padrino.eligesec');
		Route::post('padrino/nuevo-padrino','METADATO_PADRINOS_Controller@nuevoPadrino')->name('padrino.nuevo');

		Route::get('padrino/nuevo-padrino-app/','METADATO_PADRINOS_Controller@crearPadrinoAPP')->name('padrino.crear-nuevo');
		Route::get('padrino/sector-padrino-app/','METADATO_PADRINOS_Controller@sectorAPP')->name('padrino.padrino-sector');
		Route::post('padrino/nuevo-padrino/app','METADATO_PADRINOS_Controller@nuevoPadrinoAPP')->name('padrino.nuevo-app');
		
		Route::resource('usuario','FURWEB_CTRL_ACCESO_13_Controller');
		Route::resource('padrino','METADATO_PADRINOS_Controller');
		Route::get('centro-trabajo/mantenimiento/','CENTRO_TRABAJO_Controller@eligeCentro')->name('centro-trabajo.ver');
		Route::get('centro-trabajo/nuevo/centro/registro/','CENTRO_TRABAJO_Controller@nuevoCentro')->name('centro-trabajo.registro');
		Route::resource('centro-trabajo','CENTRO_TRABAJO_Controller');
		//Route::post('cat-padrino/store','METADATO_PADRINOS_Controller@store')->name('cat-padrino.store');
	});
