<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HaiController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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
})->name('irfanem');

Route::redirect('/instagram', '/irfanem')->name('redirect');

Route::fallback(function(){
    return "404 : Rak Ketemu !";
})->name('fallback');

Route::view('/perkenalan', 'tentang.kulo', [
        'nama' => 'Programer Anyaran Cilacap', 
        'judul' => 'Tentang kulo'
    ])->name('tentang.kulo');

Route::get('/perkenalan2', function(){
    return view('tentang.kulo', [
        'nama' => 'Programer Anyaran Cilacap', 
        'judul' => 'Tentang kulo'
    ]);
})->name('tentang.kulo2');

Route::get('/produks/{id}', function($prodId){
    return "Produk : $prodId.";
})->name('produk.detail');

Route::get('/produks/{id}/items/{itemId}', function($prodId, $itemId){
    return "Produk : $prodId, Item : $itemId.";
})->name('produk.item.detail');

Route::get('/categories/{id}', function($categoriesId){
    return "Kategori : $categoriesId.";
})->where('id', '[0-9]+')->name('categories.detail');

Route::get('/users/{id?}', function($userId = 'kamu'){
    return "Hai $userId";
})->name('user.detail');

Route::get('/konflik/irfan', function(){
    return "Hai Irfan Machmud";
})->name('konflik.detail');

Route::get('/konflik/{$name}', function($nama){
    return "Hallo $nama";
})->name('konflik.irfan');

Route::get('/product/{id}', function($id){
    $link = route('produk.detail', ['id' => $id]);
    return "Link : $link";
})->name('product.link');

Route::get('/product-redirect/{id}', function($id){
    return redirect()->route('produk.detail', ['id' => $id]);
})->name('product.redirect');

Route::get('/controller/hai', [HaiController::class, 'Hai']);

Route::get('/controller/request', [HaiController::class, 'request']);

Route::get('/controller/hai/{nama}', [HaiController::class, 'HaiNama']);

Route::get('/request/input', [InputController::class, 'halo'])->name('input.get');
Route::post('/request/input', [InputController::class, 'halo'])->name('input.post');
Route::post('/request/input/namadepan', [InputController::class, 'haloFirst'])->name('input.nested');
Route::post('/request/input/semua', [InputController::class, 'inputAll'])->name('input.semua');
Route::post('/request/input/array', [InputController::class, 'inputArray'])->name('input.array');
Route::post('/request/input/tipe', [InputController::class, 'inputType'])->name('input.tipe');
Route::post('/request/input/only', [InputController::class, 'inputOnly'])->name('input.only');
Route::post('/request/input/except', [InputController::class, 'inputExcept'])->name('input.except');
Route::post('/request/input/merge', [InputController::class, 'inputMerge'])->name('input.merge');

Route::post('/file/upload', [FileController::class, 'upload'])->name('upload.file');
Route::get('/response/hallo', [ResponseController::class, 'response'])->name('response.hallo');
Route::get('/response/header', [ResponseController::class, 'header'])->name('response.header');