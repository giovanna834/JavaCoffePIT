<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','post'], '/categoria', [App\Http\Controllers\HomeController::class, 'categoria'])->name('categoria');

Route::match(['get','post'], '/{idcategoria}/categoria', [App\Http\Controllers\HomeController::class, 'categoria'])->name('categoria_por_id');

Route::match(['get','post'], '/{idproduto}/carrinho/adicionar', [App\Http\Controllers\HomeController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');

Route::match(['get','post'], '/carrinho', [App\Http\Controllers\HomeController::class, 'verCarrinho'])->name('ver_carrinho');

Route::match(['get','post'], '/{indice}/excluircarrinho', [App\Http\Controllers\HomeController::class, 'excluirCarrinho'])->name('carrinho_excluir');


Route::post('/carrinho/finalizar', [App\Http\Controllers\HomeController::class, 'finalizar'])->name('carrinho_finalizar');

Route::match(['get','post'], '/compras/historico', [App\Http\Controllers\HomeController::class, 'historico'])->name('compra_historico');

Route::post('/compras/detalhes', [App\Http\Controllers\HomeController::class, 'detalhes'])
            ->name('compra_detalhes');

Route::match(['get','post'], '/endereco', [App\Http\Controllers\HomeController::class, 'endereco'])->name('endereco');
Route::match(['get','post'], '/endereco/cadastrar', [App\Http\Controllers\HomeController::class, 'cadastrarEndereco'])->name('cadastrar_endereco');

Route::match(['get','post'], '/enderecos', [App\Http\Controllers\HomeController::class, 'verEndereco'])->name('verEnderecos');

// Route::match(['get','post'], '/{indice}/excluirendereco', [App\Http\Controllers\HomeController::class, 'excluirEndereco'])->name('endereco_excluir');

Route::delete('/excluirendereco/{id}', [App\Http\Controllers\HomeController::class, 'excluirEndereco']);

Route::match(['get','post'], '/cartao', [App\Http\Controllers\HomeController::class, 'cartao'])->name('cartao');
Route::match(['get','post'], '/cartao/cadastrar', [App\Http\Controllers\HomeController::class, 'cadastrarCartao'])->name('cadastrar_cartao');
Route::match(['get','post'], '/cartoes', [App\Http\Controllers\HomeController::class, 'verCartao'])->name('verCartoes');

Route::delete('/excluircartao/{id}', [App\Http\Controllers\HomeController::class, 'excluirCartao']);

Route::match(['get','post'], '/finalizarPedido', [App\Http\Controllers\HomeController::class, 'finalizarPedido'])->name('finalizarPedido');
