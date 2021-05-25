<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'IndexController@index');
Route::get('/produtos', 'IndexController@produtos');
Route::get('/produtos/detalhes/{id}', 'IndexController@detalhesProdutos')->name('detalhes');
Route::get('filtro', 'IndexController@filtro');

Auth::routes(['register'=> false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Categorias', 'CategoriaController');
    Route::resource('/Produtos', 'ProdutoController');
    Route::resource('/Marcas', 'MarcaController');
    Route::put('/Produto/{id}', 'ProdutoController@ativar')->name('Produto.ativa');
    Route::resource('/User', 'UserController');
    Route::put('/Senha/{id}', 'UserController@senha')->name('Senha.update');
});
