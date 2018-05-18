<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('home');
});

// --- ENRUTADO ARTÍCULOS
Route::group( [ 'prefix' => 'articulos' ], function(){
	Route::put( '/{id}/update','Almacen\ArticuloController@update' );
	Route::get( '/{id}/destroy','Almacen\ArticuloController@destroy' );
});
Route::resource('articulos','Almacen\ArticuloController',['except' => ['destroy','update']]);


// --- ENRUTADO CATEGORÍAS
Route::group( [ 'prefix' => 'categorias' ], function(){
	Route::put( '/{id}/update','Almacen\CategoriaController@update' );
	Route::get( '/{id}/destroy','Almacen\CategoriaController@destroy' );
});
Route::resource( 'categorias','Almacen\CategoriaController',[ 'except' => [ 'destroy','update' ] ] );


// --- ENRUTADO DE PRESENTACIONES --- //
Route::group( [ 'prefix' => 'presentaciones' ], function(){
	Route::put( '/{id}/update','Almacen\PresentacionController@update' );
	Route::get( '/{id}/destroy','Almacen\PresentacionController@destroy' );
});
Route::resource( 'presentaciones','Almacen\PresentacionController',[ 'except' => [ 'destroy','update' ] ] );


// --- ENRUTADO CATEGORÍAS
Route::group( [ 'prefix' => 'lotes' ], function(){
	Route::put( '/{id}/update','Almacen\LoteController@update' );
	Route::get( '/{id}/destroy','Almacen\LoteController@destroy' );
});
Route::resource( 'lotes','Almacen\LoteController',[ 'except' => [ 'destroy','update' ] ] );



// --- NRUTADO DE PROVEEDORES --- //
Route::group( [ 'prefix' => 'proveedores' ], function(){
	Route::put( '/{id}/update','Compras\ProveedorController@update' );
	Route::get( '/{id}/destroy','Compras\ProveedorController@destroy' );
});
Route::resource( 'proveedores','Compras\ProveedorController',[ 'except' => [ 'destroy','update' ] ] );



// --- ENRUTATO DE CLIENTES ---//
Route::group( [ 'prefix'=>'clientes' ], function(){
	Route::put( '/{id}/update','Ventas\ClienteController@update' );
	Route::get( '/{id}/destroy','Ventas\ClienteController@destroy' );
});
Route::resource( 'clientes','Ventas\ClienteController',[ 'except' => [ 'destroy','update' ] ] );	



// --- COTIZADOR --- //
Route::group( [ 'prefix'=>'cotizacion' ], function(){
	Route::put( '/{id}/update','Cotizador\CotizacionController@update' );
	Route::get( '/{id}/destroy','Cotizador\CotizacionController@destroy' );
	//Exportar, Exportar y descargar
	Route::get('{id}/export/{type}','Cotizador\CotizacionPDFController@export');
});
Route::resource( 'cotizacion','Cotizador\CotizacionController',[ 'except' => [ 'destroy','update' ] ] );

Route::get( 'cotizacion/{id}/agrega_articulo','Cotizador\AgregaArticuloController@create' );
Route::post( 'cotizacion/{id}/agrega_articulo','Cotizador\AgregaArticuloController@store' );
Route::post( 'cotizacion/{id}/destroy_articulo','Cotizador\AgregaArticuloController@destroy' );


