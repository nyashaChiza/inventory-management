<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockCategoryController;

Route::get('/', [StockCategoryController::class, 'index'])->name('listCategories');
Route::post('/stockCategory/create', [StockCategoryController::class, 'create'])->name('stockCategoryCreate');
Route::get('/stockCategory/create', [StockCategoryController::class, 'showCreateForm'])->name('stockCategoryCreateForm');
Route::get('/stockCategory/update/{id}', [StockCategoryController::class, 'showUpdateForm'])->name('stockCategoryUpdateForm');
Route::get('/stockCategory/delete/{id}', [StockCategoryController::class, 'destroy'])->name('stockCategoryDelete');
Route::post('/stockCategory/update/{id}', [StockCategoryController::class, 'update'])->name('updateStockCategoryForm');


Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');
Route::get('/stocks/{stock}', [StockController::class, 'show'])->name('stocks.show');
Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
Route::put('/stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');
Route::delete('/stocks/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');
