<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

route::get('/', [TransactionController::class, 'index']);
route::get('/create', [TransactionController::class, 'create'])->name('create');
route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit');
route::post('/store', [TransactionController::class, 'store'])->name('store');
route::delete('/delete/{id}', [TransactionController::class, 'destroy'])->name('destroy');
route::put('/update/{id}', [TransactionController::class, 'update'])->name('update');

