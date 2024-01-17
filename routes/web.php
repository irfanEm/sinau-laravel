<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FormController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\VerifyCsrfToken;

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

Route::post('/file/upload', [FileController::class, 'upload'])->name('upload.file')->withoutMiddleware(VerifyCsrfToken::class);
Route::get('/response/hallo', [ResponseController::class, 'response'])->name('response.hallo');
Route::get('/response/header', [ResponseController::class, 'header'])->name('response.header');
Route::get('/response/view', [ResponseController::class, 'responseView'])->name('response.view');
Route::get('/response/json', [ResponseController::class, 'responseJson'])->name('response.json');
Route::get('/response/file', [ResponseController::class, 'responseFile'])->name('response.file');
Route::get('/response/download', [ResponseController::class, 'responseFileDownload'])->name('response.download');

Route::get('/cookie/set', [CookieController::class, 'setCookie'])->name('cookie.set');
Route::get('/cookie/get', [CookieController::class, 'getCookie'])->name('cookie.get');
Route::get('/cookie/clear', [CookieController::class, 'clearCookie'])->name('cookie.clear');

Route::get('/redirect/from', [RedirectController::class, 'redirectFrom'])->name('redirect.from');
Route::get('/redirect/to', [RedirectController::class, 'redirectTo'])->name('redirect.to');
Route::get('/redirect/nama', [RedirectController::class, 'redirectName'])->name('redirect.name');
Route::get('/redirect/hai/{nama}', [RedirectController::class, 'redirectHai'])->name('redirect.hai');
Route::get('/redirect/action', [RedirectController::class, 'redirectAction'])->name('redirect.action');
Route::get('/redirect/away', [RedirectController::class, 'redirectAway'])->name('redirect.away');

Route::get('/middleware/contoh', function(){ return "Aman."; })->name('middleware.contoh')->middleware('contoh:Balqis_FA, 401');
Route::get('/middleware/grup', function(){ return "Grup."; })->name('middleware.grup')->middleware('prganyrn');

Route::get('/form', [FormController::class, 'getForm'])->name('form.get');
Route::post('/form', [FormController::class, 'postForm'])->name('form.post');