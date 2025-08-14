<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ExportController;

Route::get('/export-excel', [ExportController::class, 'exportExcel']);
Route::get('/export-pdf', [ExportController::class, 'exportPdf']);
