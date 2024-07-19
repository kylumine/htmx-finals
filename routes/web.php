<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('students', StudentController::class);
Route::resource('accounts', AccountController::class);
Route::resource('charges', ChargeController::class);
Route::resource('payments', PaymentController::class);

Route::get('/billing/{account}', [BillingController::class, 'show'])->name('billing.show');
// Route::post('/charges/store', [ChargeController::class, 'store'])->name('charges.store');
// Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');

Route::delete('/charges/{charge}', [ChargeController::class, 'destroy'])->name('charges.destroy');
Route::post('/charges/store', [ChargeController::class, 'store'])->name('charges.store');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');




// Route::get('/billing/{student}', [BillingController::class, 'show'])->name('billing.show');
// Route::post('/accounts/{account}/charges', [ChargeController::class, 'store'])->name('charges.store');
// Route::delete('/charges/{charge}', [ChargeController::class, 'destroy'])->name('charges.destroy');
// Route::post('/accounts/{account}/payments', [PaymentController::class, 'store'])->name('payments.store');





require __DIR__.'/auth.php';
