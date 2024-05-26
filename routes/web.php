<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('list', [BillController::class, 'index'])->name('bill.index');
Route::get('paylist', [BillController::class, 'bill_payable_list'])->name('bill.paylist');

Route::get('duedate-receive', [BillController::class, 'due_date_receive_list'])->name('bill.duedatereceive');
Route::get('duedate-pay', [BillController::class, 'due_date_pay_list'])->name('bill.duedatepay');

Route::get('create', [BillController::class, 'create'])->name('bill.create');
Route::post('store', [BillController::class, 'store'])->name('bill.store');
Route::get('edit/{bill}', [BillController::class, 'edit'])->name('bill.edit');
Route::post('update/{bill}', [BillController::class, 'update'])->name('bill.update');
Route::post('delete/{bill}', [BillController::class, 'destroy'])->name('bill.delete');

// Route::get('pdf', [PdfController::class, 'pdf_download'])->name('bill.pdf');