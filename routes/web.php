<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ckeditor5', function () {
    return view('ckeditor5');
});

Route::post('/upload', [ImageController::class,'upload'])->name('ckeditor.upload');