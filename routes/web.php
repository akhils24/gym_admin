<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CustomerController::class,'show']);

Route::get('register',[CustomerController::class, 'regshow']);
Route::post('custreg',[CustomerController::class, 'insert']);

Route::get('custview',[CustomerController::class, 'custview']);

Route::get('customers/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit');
Route::post('customers/{id}/update',[CustomerController::class,'update'])->name('customers.update');

Route::get('/customers/{id}/payment', [CustomerController::class, 'showPaymentPage'])->name('customers.payment');