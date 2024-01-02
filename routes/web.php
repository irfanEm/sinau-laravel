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

Route::get('/irfanem', function(){
    return "Hai, perkenalkan saya adalah programmer anyaran dari Cilacap.";
});

Route::redirect('/instagram', '/irfanem');

Route::fallback(function(){
    return "404 : Rak Ketemu !";
});

Route::view('/perkenalan', 'tentang.kulo', [
        'nama' => 'Programer Anyaran Cilacap', 
        'judul' => 'Tentang kulo'
    ]);

Route::get('/perkenalan2', function(){
    return view('tentang.kulo', [
        'nama' => 'Programer Anyaran Cilacap', 
        'judul' => 'Tentang kulo'
    ]);
});

Route::get('/produks/{id}', function($prodId){
    return "Produk : $prodId.";
});

Route::get('/produks/{id}/items/{id}', function($prodId, $itemId){
    return "Produk : $prodId, Item : $itemId.";
});

Route::get('/categories/{id}', function($categoriesId){
    return "Kategori : $categoriesId.";
})->where('id', '[0-9]+');