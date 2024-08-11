<?php

use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RutaProfesionalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
// Ruta de autenticación con verificación de email habilitada
Auth::routes(['verify' => true]);

// Ruta para verificar el email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) { 
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Ruta para reenviar la notificación de verificación
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/check-email', [UserController::class, 'checkEmail']);

Route::post('/payments', [PaymentController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'homePage'])->name('home-page');
Route::get('/home/cursos', [HomeController::class, 'cursosPage'])->name('cursos-home');
Route::get('/home/precios', [HomeController::class, 'preciosPage'])->name('precios-home');
Route::get('/home/purchase', [HomeController::class, 'purchasePage'])->name('purchase-home');

Route::post('/lessons/{lesson}/view', [LessonController::class, 'markAsViewed'])->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/log-in', [UserController::class, 'loginUser'])->name('login');
    Route::get('/sign-up', [UserController::class, 'createUser'])->name('sign-up');
    Route::post('/process-login', [UserController::class, 'loginUserForm'])->name('process-login');
    Route::post('/process-sign-up', [UserController::class, 'createUserForm'])->name('process-sign-up');
});

// Aquí van las rutas que deseas proteger
Route::middleware(['auth'])->group(function () {

    // Obtener cuentas del puc
    Route::post('/lessons/getPucAccounts', [LessonController::class, 'getCuentas'])->name('lessons.getPucAccounts');

    // Calificar formulario DIAN
    Route::post('/workshop/{workshop}/calificarWorkshop', [WorkshopController::class, 'calificarWorkshop'])->name('calificar-workshop');
    
    // Verificar la respuesta de un cuestionario
    Route::post('/lessons/{lesson}/verifyResponse', [LessonController::class, 'verifyResponse'])->name('lessons.verifyResponse');

    // Obtener JSON de guia
    Route::post('/lesson/getGuiaJSON', [LessonController::class, 'getGuiaJSON'])->name('lessons.guiajson');

    // Dashboard inicial
    Route::get('/dashboard', [UserController::class, 'loginDashboard'])->name('login-dashboard');

    // Certificados
    Route::get('/certificados', [CertificatesController::class, 'pageCertificates'])->name('certificados');

    // Dashboard inicial de grupos
    Route::get('/dashboard-grupos', [GruposController::class, 'dashboardGrupos'])->name('dashboard-grupos');

    // Listado de grupos
    Route::get('/list-groups', [GruposController::class, 'listGroups'])->name('list-groups');

    // Mostrar el listado de miembros
    Route::get('/list-members', [GruposController::class, 'listMembers'])->name('list-members');

    Route::post('/group-get', [GruposController::class, 'getGroup'])->name('get-group');
    Route::post('/edit-group', [GruposController::class, 'editGroup'])->name('edit-group');
    Route::post('/create-group', [GruposController::class, 'createGroup'])->name('create-group');
    Route::post('/delete-group', [GruposController::class, 'deleteGroup'])->name('delete-group');

    // User
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user-profile');

    // Cursos
    Route::get('/cursos', [CursoController::class, 'listCursos'])->name('list-cursos');
    Route::get('/cursos/{curso}', [CursoController::class, 'viewCursos'])->name('view-curso');

    // Lecciones
    Route::get('/cursos/{curso}/formularioDIAN/{lesson}', [LessonController::class, 'formularioDIAN'])->name('formulario-curso-DIAN');
    Route::get('/cursos/{curso}/lessons/{lesson}', [LessonController::class, 'viewLesson'])->name('view-lesson');

    // Rutas Profesionales
    Route::get('/rutas-profesionales', [RutaProfesionalController::class, 'listRutas'])->name('list-rutas-profesional');
    Route::get('/rutas-profesionales/{ruta}', [RutaProfesionalController::class, 'viewRutas'])->name('view-ruta-profesional');
});

Route::get('/forgot-user', function () {
    return view('user.forgot');
})->name('forgot-user');;
