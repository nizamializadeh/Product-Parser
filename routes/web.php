<?php

use App\Http\Controllers\ProductParserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('parser');
});

Route::get('/parse', [ProductParserController::class, 'parse']);
