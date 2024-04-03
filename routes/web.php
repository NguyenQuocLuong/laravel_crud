<?php
use App\Http\Controllers\CrudUserController;
use Illuminate\Support\Facades\Route;

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
Route::get('home', [CrudUserController::class, 'checkLogin'])->name('home');

Route::get('/', function () {
    return view('login');
});
Route::get('login', [CrudUserController::class, 'login'])->name('login');

Route::post('login',[CrudUserController::class, 'authUser'])->name('user.authUser');// postlogin
Route::get('/register',[CrudUserController::class, 'getRegister'])->name('getRegister');

Route::post('postregister',[CrudUserController::class, 'postRegister'])->name('postRegister');

Route::get('/logout',[CrudUserController::class, 'logOut'])->name('logout');
