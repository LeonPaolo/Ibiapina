<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'IndexController@index');
Route::get('/produtos', 'IndexController@produtos');
Route::get('/produtos/detalhes/{id}', 'IndexController@detalhesProdutos')->name('detalhes');

//Filtros com mais vendidos
Route::get('maisVendido/{status}', 'FiltroController@maisVendido');
Route::get('maisVendidoMarca/{status}/{marca}', 'FiltroController@maisVendidoMarca');
Route::get('maisVendidoCategoria/{status}/{categoria}', 'FiltroController@maisVendidoCategoria');
Route::get('maisVendidoCategoriaMarca/{status}/{categoria}/{marca}', 'FiltroController@maisVendidoCategoriaMarca');
//filtros normais
Route::get('FiltroCategoria/{categoria}', 'FiltroController@FiltroCategoria');
Route::get('FiltroMarca/{marca}', 'FiltroController@FiltroMarca');
Route::get('FiltroMarcaCategoria/{marca}/{categoria}', 'FiltroController@FiltroMarcaCategoria');

//Formulario de contato
Route::post('contato','IndexController@form')->name('formulario');

//Busca
Route::get('busca/{produto}', 'FiltroController@busca');

Auth::routes(['register'=> false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Categorias', 'CategoriaController');
    Route::resource('/Produtos', 'ProdutoController');
    Route::resource('/Marcas', 'MarcaController');
    Route::put('/Produto/{id}', 'ProdutoController@ativar')->name('Produto.ativa');
    Route::resource('/User', 'UserController');
    Route::put('/Senha/{id}', 'UserController@senha')->name('Senha.update');
    //Filtros com mais vendidos
    Route::get('AdminMaisVendido/{status}', 'AdminFiltroController@maisVendido');
    Route::get('AdminMaisVendidoMarca/{status}/{marca}', 'AdminFiltroController@maisVendidoMarca');
    Route::get('AdminMaisVendidoCategoria/{status}/{categoria}', 'AdminFiltroController@maisVendidoCategoria');
    Route::get('AdminMaisVendidoCategoriaMarca/{status}/{categoria}/{marca}', 'AdminFiltroController@maisVendidoCategoriaMarca');
    //filtros normais
    Route::get('AdminFiltroCategoria/{categoria}', 'AdminFiltroController@FiltroCategoria');
    Route::get('AdminFiltroMarca/{marca}', 'AdminFiltroController@FiltroMarca');
    Route::get('AdminFiltroMarcaCategoria/{marca}/{categoria}', 'AdminFiltroController@FiltroMarcaCategoria');
});
