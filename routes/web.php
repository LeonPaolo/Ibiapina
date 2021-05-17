<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'IndexController@index');

Auth::routes(['register'=> false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Categorias', 'CategoriaController');
    Route::resource('/Produtos', 'ProdutoController');
    Route::resource('/Marcas', 'MarcaController');
});
