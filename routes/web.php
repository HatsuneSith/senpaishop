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
    return view('index');    
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/mail', 'HomeController@mail');

Route::get('/confirmacion/{email}/{codigo}', 'GeneralController@confirmar_cuenta');

Route::get('/agregar-articulo', 'additemController@mVista');
Route::get('/buscar-articulo', 'additemController@mBuscarArticulo');
Route::get('/buscar-articulo2', 'additemController@mBuscarArticulo2');
Route::get('/eliminar-subcategoria/', 'additemController@mElimiarSubCat_Item');
Route::get('/agregar-subcategoria/', 'additemController@mAgregarSubCat_Item');
Route::post('/agregar-articulo-individual/', 'additemController@mAgregar_Item');
Route::post('/upload', 'additemController@mAdd');

Route::get('/product/{cat_id}', 'CategoriaController@productos_categoria');
Route::get('/product/{cat_id}/filtro', 'CategoriaController@productos_categoria_filtro');
Route::get('/single/{art_id}', 'CategoriaController@producto');
Route::get('/inventario', 'CategoriaController@inventario');
Route::post('/comsuc', 'CategoriaController@comentariosuccess');