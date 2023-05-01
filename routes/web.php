<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['guest']], function() {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('login.show');

    // ログイン処理
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    // ホーム画面
    Route::get('home', function () {
        return view('home');
    })->name('home');

    //ロゴアウト
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

