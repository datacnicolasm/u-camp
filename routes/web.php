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
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/

// Rutas de autenticación con verificación de email habilitada
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

// Rutas públicas
Route::get('/', [HomeController::class, 'homePage'])->name('home-page');
Route::get('/home/cursos', [HomeController::class, 'cursosPage'])->name('cursos-home');
Route::get('/home/precios', [HomeController::class, 'preciosPage'])->name('precios-home');
Route::get('/home/purchase', [HomeController::class, 'purchasePage'])->name('purchase-home');
Route::post('/check-email', [UserController::class, 'checkEmail']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rutas para usuarios invitados
Route::middleware(['guest'])->group(function () {
    Route::get('/log-in', [UserController::class, 'loginUser'])->name('login');
    Route::get('/sign-up', [UserController::class, 'createUser'])->name('sign-up');
    Route::post('/process-login', [UserController::class, 'loginUserForm'])->name('process-login');
    Route::post('/process-sign-up', [UserController::class, 'createUserForm'])->name('process-sign-up');
});

// Grupos
Route::prefix('groups')->group(function () {
    Route::post('/get', [GruposController::class, 'getGroup'])->name('get-group');
    Route::post('/edit', [GruposController::class, 'editGroup'])->name('edit-group');
    Route::post('/create', [GruposController::class, 'createGroup'])->name('create-group');
    Route::post('/delete', [GruposController::class, 'deleteGroup'])->name('delete-group');
    Route::post('/link', [GruposController::class, 'createLinkGroup'])->name('create-link-group');
    Route::get('/join-group/{key}', [GruposController::class, 'joinGroup'])->name('join-group');
    Route::post('/link-new-user', [GruposController::class, 'createUserGroup'])->name('link-new-user');
    Route::post('/link-is-user', [GruposController::class, 'linkIsUser'])->name('link-is-user');
    Route::post('/link-new-user-view', [GruposController::class, 'toNewUser'])->name('link-new-user-view');
    Route::post('/link-attach-group', [GruposController::class, 'attachGroup'])->name('link-attach-group');
    Route::post('/delete-user', [GruposController::class, 'deleteUserGroup'])->name('delete-user');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Dashboard inicial
    Route::get('/dashboard', [UserController::class, 'loginDashboard'])->name('login-dashboard');

    // Certificados
    Route::get('/certificados', [CertificatesController::class, 'pageCertificates'])->name('certificados');

    // Grupos
    Route::prefix('groups')->group(function () {
        Route::get('/dashboard', [GruposController::class, 'dashboardGrupos'])->name('dashboard-grupos');
        Route::get('/list', [GruposController::class, 'listGroups'])->name('list-groups');
        Route::get('/members', [GruposController::class, 'listMembers'])->name('list-members');
    });

    // Perfil de usuario
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user-profile');

    // Cursos
    Route::prefix('cursos')->group(function () {
        Route::get('/', [CursoController::class, 'listCursos'])->name('list-cursos');
        Route::get('/{curso}', [CursoController::class, 'viewCursos'])->name('view-curso');
        Route::get('/{curso}/formularioDIAN/{lesson}', [LessonController::class, 'formularioDIAN'])->name('formulario-curso-DIAN');
        Route::get('/{curso}/lessons/{lesson}', [LessonController::class, 'viewLesson'])->name('view-lesson');
    });

    // Lecciones
    Route::prefix('lessons')->group(function () {
        Route::post('/getPucAccounts', [LessonController::class, 'getCuentas'])->name('lessons.getPucAccounts');
        Route::post('/{lesson}/verifyResponse', [LessonController::class, 'verifyResponse'])->name('lessons.verifyResponse');
        Route::post('/getGuiaJSON', [LessonController::class, 'getGuiaJSON'])->name('lessons.guiajson');
        Route::post('/{lesson}/view', [LessonController::class, 'markAsViewed'])->middleware('auth');
    });

    // Rutas Profesionales
    Route::prefix('rutas-profesionales')->group(function () {
        Route::get('/', [RutaProfesionalController::class, 'listRutas'])->name('list-rutas-profesional');
        Route::get('/{ruta}', [RutaProfesionalController::class, 'viewRutas'])->name('view-ruta-profesional');
    });

    // Talleres
    Route::post('/workshop/{workshop}/calificarWorkshop', [WorkshopController::class, 'calificarWorkshop'])->name('calificar-workshop');
});

// Ruta para recuperar usuario
Route::get('/forgot-user', function () {
    return view('user.forgot');
})->name('forgot-user');