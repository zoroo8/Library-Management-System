<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[AdminController::class,'index']);

route::get('/category_page',[AdminController::class,'category_page'])->middleware('admin');

route::post('/add_category',[AdminController::class,'add_category'])->middleware('admin');

route::get('/cat_delete/{id}',[AdminController::class,'cat_delete'])->middleware('admin');

route::get('/edit_category/{id}',[AdminController::class,'edit_category'])->middleware('admin');

route::post('/update_category/{id}',[AdminController::class,'update_category'])->middleware('admin');

route::get('/add_book',[AdminController::class,'add_book'])->middleware('admin');

route::post('/store_book',[AdminController::class,'store_book'])->middleware('admin');

route::get('/show_book',[AdminController::class,'show_book'])->middleware('admin');

route::get('/book_delete/{id}',[AdminController::class,'book_delete'])->middleware('admin');

route::get('/edit_table/{id}',[AdminController::class,'edit_table'])->middleware('admin');

route::post('/update_book/{id}',[AdminController::class,'update_book'])->middleware('admin');

route::get('/borrow_books/{id}',[HomeController::class,'borrow_books']);

route::get('/borrow_request',[AdminController::class,'borrow_request'])->middleware('admin');

route::get('/approve_book/{id}',[AdminController::class,'approve_book'])->middleware('admin');

route::get('/return_book/{id}',[AdminController::class,'return_book'])->middleware('admin');

route::get('/reject_book/{id}',[AdminController::class,'reject_book'])->middleware('admin');

route::get('/book_history',[HomeController::class,'book_history']);

route::get('/cancel_req/{id}',[HomeController::class,'cancel_req']);

route::get('/explore',[HomeController::class,'explore']);

route::get('/search',[HomeController::class,'search']);