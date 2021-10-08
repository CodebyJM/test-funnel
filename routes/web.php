<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;


Route::get('/', function () {
    return view('initial-lead');
});

Route::get('next/{submission}', [FormController::class, 'nextForm']);

Route::post('submit/lead', [FormController::class, 'submitInitialLead']);
Route::post('submit/insurance', [FormController::class, 'submitInsurance']);
Route::post('submit/self-pay', [FormController::class, 'submitSelfPay']);