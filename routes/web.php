<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockCategoryController;

Route::get('/', [StockCategoryController::class, 'index'])->name('listCategories');
Route::post('/stockCategory/create', [StockCategoryController::class, 'store'])->name('stockCategoryStore');
Route::get('/stockCategory/create', [StockCategoryController::class, 'create'])->name('stockCategoryCreateForm');
Route::get('/stockCategory/update/{id}', [StockCategoryController::class, 'showUpdateForm'])->name('stockCategoryUpdateForm');
Route::get('/stockCategory/delete/{id}', [StockCategoryController::class, 'destroy'])->name('stockCategoryDelete');
Route::post('/stockCategory/update/{id}', [StockCategoryController::class, 'update'])->name('updateStockCategoryForm');

Route::get('/stocks', [StockController::class, 'index'])->name('stockIndex');
Route::get('/stocks/create', [StockController::class, 'create'])->name('stockCreate');
Route::post('/stocks', [StockController::class, 'store'])->name('stockStore');
Route::get('/stocks/{stock}', [StockController::class, 'show'])->name('stockShow');
Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocksEdit');
Route::put('/stocks/update/{stock}', [StockController::class, 'update'])->name('stockUpdate');
Route::delete('/stocks/{stock}', [StockController::class, 'destroy'])->name('stockDestroy');

