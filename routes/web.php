<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use Illuminate\Routing\Router;
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

Route::get('/', [DashboardController::class,'ujang']);

//Route::get('/',[ProdukController::class,'asep']);


Route::get('/dashboard', function () {
    return view('dashboard');
});


//Route::get('/produk/{kategori}/{kode_produk}', function($kategori,$kode_produk){
  //  return " untuk kategori $kategori "."Kode yang dipilih ".$kode_produk;
//});

Route::get('/poroduk/{id}',[ProdukController::class,'no_2']);

//3
Route::get('/produk/tambah', function () {
    return view('tambah-produk'); 
})->name('produk.tambah');
Route::post('/produk/store', [ProdukController::class, 'no_3'])->name('produk.store');

Route::get('/produk',[ProdukController::class,'no_4']);

//no5
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Halaman Dashboard Admin';
    });

    Route::get('/laporan', function () {
        return 'Halaman Laporan Admin';
    });
});

//no6
Route::get('/admin/dashboard',function() {
    if (!Auth::check()){
        return response()->json(['Akses ditolak, Silahkan login'],403);
    }
    return view('admin.dashboard');
});

Route::get('/produk/{id}/edit', [ProdukController::class,'edit'])->name('produk.edit');
//no7
Route::post('/produk/{id}',[ProdukController::class,'no_7'])->name('produk.update');

//no8
Route::delete('/produk{id}',[ProdukController::class,'no_8'])->name('produk.delete');



