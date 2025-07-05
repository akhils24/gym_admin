<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CustomerController::class,'show']);

Route::get('register',[CustomerController::class, 'regshow']);
Route::post('custreg',[CustomerController::class, 'insert']);

Route::get('custview',[CustomerController::class, 'custview']);

Route::get('customers/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit');
Route::post('customers/{id}/update',[CustomerController::class,'update'])->name('customers.update');


Route::get('/customers/{id}/payment', [PaymentController::class,'show'])->name('customers.payment');
Route::post('/customers/{id}/pay', [PaymentController::class,'insert'])->name('customers.pay');

Route::get('inactivecust',[PaymentController::class, 'view']);
Route::post('/view/expiry',[PaymentController::class,'update'])->name('customers.expiry');

Route::get('paydtls',[PaymentController::class,'dtls']);