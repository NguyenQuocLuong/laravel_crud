<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('list', [CustomAuthController::class, 'list']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('user/{id}', [CustomAuthController::class, 'show'])->name('detail-user');
Route::get('user/{id}/edit', [CustomAuthController::class, 'edit'])->name('edit');
Route::patch('user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::delete('user/{id}', [CustomAuthController::class, 'delete'])->name('deletee');