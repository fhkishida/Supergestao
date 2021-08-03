<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

define('PathController', "\App\Http\Controllers");
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
Route::get('/', PathController.'\PrincipalController@index')->name('site.index');
Route::get('/contato', PathController.'\ContatoController@contato')->name('site.contato');
Route::post('/contato', PathController.'\ContatoController@contato')->name('site.contato');
Route::get('/sobre-nos', PathController.'\SobreNosController@index')->name('site.sobrenos');
Route::get('/login', function(){ return 'login'; })->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedores', PathController.'\FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'produtos'; })->name('app.produtos');
});

Route::fallback(function(){
    echo 'a rota acessada não existe, vamos para a pagina <a href="'.route('site.index').'">inicial</a>? ';
});

Route::get('/teste/{p1}/{p2}', PathController.'\TesteController@teste')->name('teste');
/**
 * Redirects begin
 */
// Route::get('rota1', function(){
//     echo 'rota1';
// })->name('site.rota1');
// Route::get('rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');
// Route::redirect('/rota2', 'rota1');
/**
 * Redirects end
 */

/**
 * Tipagem em rotas begin
 */
// Route::get('/contato/{nome}/{categoria_id}', function (string $nome = 'desconhecido', int $categoria_id = 1) {
//     echo "Estamos aqui: $nome, $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[a-zA-Z]+');
/**
 * Tipagem em rotas end
 */