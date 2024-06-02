<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'loginUser'])->name('login');
Route::post('/process-login', [UserController::class, 'loginUserForm'])->name('process-login');

Route::middleware('auth')->group(function () {
    // Aquí van las rutas que deseas proteger
    Route::get('/dashboard', [UserController::class, 'loginDashboard'])->name('login-dashboard');
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user-profile');
    Route::get('/cursos', [CursoController::class, 'listCursos'])->name('list-cursos');
    Route::get('/cursos/{curso}', [CursoController::class, 'viewCursos'])->name('view-curso');
});

Route::get('/forgot-user', function () {
    return view('user.forgot');
})->name('forgot-user');;
