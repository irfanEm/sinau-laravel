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
use Illuminate\Support\Facades\URL;

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

Route::prefix('/request')->group(function(){
    Route::get('/input', [InputController::class, 'halo'])->name('input.get');
    Route::post('/input', [InputController::class, 'halo'])->name('input.post');
    Route::post('/input/namadepan', [InputController::class, 'haloFirst'])->name('input.nested');
    Route::post('/input/semua', [InputController::class, 'inputAll'])->name('input.semua');
    Route::post('/input/array', [InputController::class, 'inputArray'])->name('input.array');
    Route::post('/input/tipe', [InputController::class, 'inputType'])->name('input.tipe');
    Route::post('/input/only', [InputController::class, 'inputOnly'])->name('input.only');
    Route::post('/input/except', [InputController::class, 'inputExcept'])->name('input.except');
    Route::post('/input/merge', [InputController::class, 'inputMerge'])->name('input.merge');
});

Route::post('/file/upload', [FileController::class, 'upload'])->name('upload.file')->withoutMiddleware(VerifyCsrfToken::class);

Route::prefix('/response')->group(function(){
    Route::get('/hallo', [ResponseController::class, 'response'])->name('response.hallo');
    Route::get('/header', [ResponseController::class, 'header'])->name('response.header');
    Route::get('/view', [ResponseController::class, 'responseView'])->name('response.view');
    Route::get('/json', [ResponseController::class, 'responseJson'])->name('response.json');
    Route::get('/file', [ResponseController::class, 'responseFile'])->name('response.file');
    Route::get('/download', [ResponseController::class, 'responseFileDownload'])->name('response.download');
});

Route::prefix('/cookie')->group(function(){
    Route::get('/set', [CookieController::class, 'setCookie'])->name('cookie.set');
    Route::get('/get', [CookieController::class, 'getCookie'])->name('cookie.get');
    Route::get('/clear', [CookieController::class, 'clearCookie'])->name('cookie.clear');
});

Route::prefix('/redirect')->controller(RedirectController::class)->group(function(){
    Route::get('/from', 'redirectFrom')->name('redirect.from');
    Route::get('/to', 'redirectTo')->name('redirect.to');
    Route::get('/nama', 'redirectName')->name('redirect.name');
    Route::get('/hai/{nama}', 'redirectHai')->name('redirect.hai');
    Route::get('/action', 'redirectAction')->name('redirect.action');
    Route::get('/away', 'redirectAway')->name('redirect.away');
});

Route::middleware(['contoh:Balqis_FA, 401'])->prefix('/middleware')->group(function(){
    Route::get('/contoh', function(){ return "Aman."; })->name('middleware.contoh');
    Route::get('/grup', function(){ return "Grup."; })->name('middleware.grup');
});

Route::controller(FormController::class)->group(function(){
    Route::get('/form', 'getForm')->name('form.get');
    Route::post('/form', 'postForm')->name('form.post');
});

Route::get('/url/current', function(){
    return URL::full();
});
Route::get('/url/named', function(){
    // return route('redirect.hai', ['nama' => 'Balqis_FA']);
    // return url()->route('redirect.hai', ['nama' => 'Balqis_FA']);
    return URL::route('redirect.hai', ['nama' => 'Balqis_FA']);
});

Route::get('/url/action', function(){
    // return action([FormController::class, 'getForm']);
    // return url()->action([FormController::class, 'getForm']);
    return URL::action([FormController::class, 'getForm']);
});
