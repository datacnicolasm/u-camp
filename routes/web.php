<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RutaProfesionalController;
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

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/', [UserController::class, 'loginUser'])->name('login');
    Route::get('/sign-up', [UserController::class, 'createUser'])->name('sign-up');
    Route::post('/process-login', [UserController::class, 'loginUserForm'])->name('process-login');
    Route::post('/process-sign-up', [UserController::class, 'createUserForm'])->name('process-sign-up');
});

Route::middleware('auth')->group(function () {
    // Aquí van las rutas que deseas proteger
    Route::get('/dashboard', [UserController::class, 'loginDashboard'])->name('login-dashboard');

    // User
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user-profile');

    // Cursos
    Route::get('/cursos', [CursoController::class, 'listCursos'])->name('list-cursos');
    Route::get('/cursos/{curso}', [CursoController::class, 'viewCursos'])->name('view-curso');
    Route::get('/cursos/{curso}/formularioDIAN', [CursoController::class, 'formularioDIAN'])->name('formulario-curso-DIAN');

    // Lecciones
    Route::get('/cursos/{curso}/lessons/{lesson}', [LessonController::class, 'viewLesson'])->name('view-lesson');

    // Rutas Profesionales
    Route::get('/rutas-profesionales', [RutaProfesionalController::class, 'listRutas'])->name('list-rutas-profesional');
    Route::get('/rutas-profesionales/{ruta}', [RutaProfesionalController::class, 'viewRutas'])->name('view-ruta-profesional');
});

Route::get('/forgot-user', function () {
    return view('user.forgot');
})->name('forgot-user');;
