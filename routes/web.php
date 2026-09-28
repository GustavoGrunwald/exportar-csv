<?php

use App\Http\Controllers\EmpregadoController;
use App\Models\Empregado;
use Illuminate\Support\Facades\Route;

Route::get('/colaboradores', [EmpregadoController::class, 'index'])->name('empregados.index');
Route::get('/colaboradores/exportar-excel', [EmpregadoController::class, 'exportExcel'])->name('empregados.export.excel');
Route::get('/colaboradores/exportar-csv', [EmpregadoController::class, 'exportCsv'])->name('empregados.export.csv');