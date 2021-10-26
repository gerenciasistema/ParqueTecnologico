<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


/*INDEX*/
Route::any('/escolas', [App\Http\Controllers\BookController::class, 'searchMunicipio'])->name('searchMunicipio');

/*STORE*/
Route::post('books/store', [BookController::class, 'store']);

/*CREAT*/
Route::get('books/create', [BookController::class, 'create']);

/*SHOW*/
Route::get('books/{id}', [BookController::class, 'show']);

/*EDIT*/
Route::get('books/{id}/edit', [BookController::class, 'edit']);

/*UPDATE*/
Route::post('books/{id}', [BookController::class, 'update']);

/*DELETE*/
Route::delete('books/{id}', [BookController::class, 'destroy']);






