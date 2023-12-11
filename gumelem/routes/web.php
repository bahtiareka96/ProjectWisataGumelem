<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutGumelemController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MerchandiseGalleryController;
use App\Http\Controllers\Admin\MerchandiseTransactionController;
use App\Http\Controllers\Admin\MerchandiseOrderController;
use App\Http\Controllers\Admin\ObjekWisataController;
use App\Http\Controllers\Admin\AboutGalleryController;
use App\Http\Controllers\HistoryTransactionController;
use App\Http\Controllers\Admin\WisataGalleryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailMerchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('/detail/{slug}', [DetailController::class, 'index']) -> name('detail');

Route::get('/order/{slug}', [OrderController::class, 'index']) -> name('order');

Route::post('/detailmerch/{id}', [DetailMerchController::class, 'process'])
    -> name('detailmerch_process')
    -> middleware(['auth', 'verified']);

Route::get('/detailmerch/{id}', [DetailMerchController::class, 'index'])
    -> name('detailmerch')
    -> middleware(['auth', 'verified']);

// Route::get('/detailmerch/confirm/{id}', [DetailMerchController::class, 'success'])
//     -> name('detailmerch-success')
//     -> middleware(['auth', 'verified']);

// Route::get('/detailmerch/remove/{id}', [DetailMerchController::class, 'remove'])
//     -> name('detailmerch-remove')
//     -> middleware(['auth', 'verified']);

Route::get('/about/{slug}', [AboutController::class, 'index']) -> name('about');

Route::get('/history/{id}', [HistoryTransactionController::class, 'index']) -> name('history');

Route::get('/users/show/{id}', [UserController::class, 'show']);

Route::put('/users/update/{id}', [UserController::class, 'update']) ;


Route::resource('users', UserController::class)
    ->only('show','update','edit')
    ->middleware('auth');


Route::prefix('admin')
    //->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('objek-wisata', ObjekWisataController::class);

        Route::resource('wisata-gallery', WisataGalleryController::class);

        Route::resource('about-gumelem', AboutGumelemController::class);

        Route::resource('about-gallery', AboutGalleryController::class);

        Route::resource('merchandise-order', MerchandiseOrderController::class);

        Route::resource('merchandise-gallery', MerchandiseGalleryController::class);

        Route::resource('merchandise-transaction', MerchandiseTransactionController::class);
    });

Auth::routes(['verify' => true]);
