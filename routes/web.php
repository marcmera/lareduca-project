<?php

// use App\Http\Middleware\isAdmin;
// use App\Http\Middleware\isStudent;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Psycho\GamesController;
use App\Http\Controllers\Psycho\IndexController;
use App\Http\Controllers\Psycho\AssignController;
use App\Http\Controllers\StudentGamesController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::view('/dashboard/neurocrib', 'admin.neurocrib.index')->name('neurocrib');
        Route::view('/dashboard/seguimiento', 'admin.seguimiento.index')->name('seguimiento');
        Route::view('/dashboard/users', 'admin.users.index')->name('admin.users.index');
        Route::view('/dashboard/students', 'admin.students.index')->name('admin.students.index');
        Route::view('/dashboard/teachers', 'admin.teachers.index')->name('admin.teachers.index');
        Route::view('/dashboard/tutors', 'admin.tutors.index')->name('admin.tutors.index');
        Route::view('/dashboard/sop', 'admin.sop.index')->name('admin.sop.index');
        Route::view('/dashboard/plans', 'admin.plans.index')->name('admin.plans.index');
    });



    // student routes
    Route::middleware('student')->prefix('student')->group(function () {
        Route::view('/dashboard', 'web.sections.student.index')->name('student.dashboard');
        Route::view('/dashboard/chat', 'web.sections.student.chat')->name('student.chat');
        Route::view('/dashboard/calendar', 'web.sections.student.calendar')->name('student.calendar');
        Route::view('/dashboard/profile', 'web.sections.student.profile')->name('student.profile');
        Route::get('/dashboard/games', [StudentGamesController::class, 'index'])->name('student.games');
    });

    // teacher routes
    Route::middleware('teacher')->prefix('teacher')->group(function () {
        Route::view('/dashboard', 'web.sections.teacher.index')->name('teacher.dashboard');
    });

    // tutor routes

    Route::middleware('tutor')->prefix('tutor')->group(function () {
        Route::view('/dashboard', 'web.sections.tutor.index')->name('tutor.dashboard');
        Route::view('/dashboard/children', 'web.sections.tutor.children')->name('tutor.children');
    });

    // psychologist routes
    Route::middleware('psychologist')->prefix('psychologist')->group(function () {
        Route::view('/dashboard', 'psychologist.dashboard')->name('dashboard');
        Route::get('/users', [IndexController::class, 'index'])->name('psycho.users.index');
        Route::post('/users', [IndexController::class, 'usersFilterByRole'])->name('psycho.users.role');
        Route::post('/users/role', [IndexController::class, 'usersFilterByRole'])->name('psycho.users.role');
        Route::get('/users/role', [IndexController::class, 'usersFilterByRole'])->name('psycho.users.role');
        Route::post('/users/course', [IndexController::class, 'usersFilterByCourse'])->name('psycho.users.course');
        Route::get('/users/course', [IndexController::class, 'usersFilterByCourse'])->name('psycho.users.course');
        Route::post('/search', [IndexController::class, 'search'])->name('psycho.users.search');
        Route::get('/search', [IndexController::class, 'search'])->name('psycho.users.search');

        // Rutas de calendario
        Route::view('/calendar', 'psychologist.calendar.index')->name('psycho.calendar.index');

        // Rutas Juegos
        Route::get('/games', [GamesController::class, 'index'])->name('psycho.games.index');
        // Rutas Juegos Categorías
        Route::get('/games/categories', [GamesController::class, 'categoriesIndex'])->name('psycho.games.categories.index');
        Route::get('/games/categories/create', [GamesController::class, 'categoriesCreateIndex'])->name('psycho.games.categories.create');
        Route::post('/games/categories/create', [GamesController::class, 'createGameCategory'])->name('psycho.games.categories.store');
        Route::get('/games/categories/edit/{id}', [GamesController::class, 'categoriesEditIndex'])->name('psycho.games.categories-edit');
        Route::put('/games/categories/edit/{id}', [GamesController::class, 'updateGameCategory'])->name('psycho.games.categories-update');
        // Rutas Juegos Juegos
        Route::get('/games/create', [GamesController::class, 'gamesCreateIndex'])->name('psycho.games.create');
        Route::post('/games/create', [GamesController::class, 'createGame'])->name('psycho.games.store');
        Route::get('/games/games', [GamesController::class, 'gamesIndex'])->name('psycho.games.games.index');
        Route::get('/games/parameters', [GamesController::class, 'gameParametersIndex'])->name('psycho.games.parameters.store');
        Route::post('/games/parameters', [GamesController::class, 'createGameParameters'])->name('psycho.games.parameters.store');
        Route::get('/games/edit/{id}', [GamesController::class, 'gamesEdit'])->name('psycho.games.edit');
        Route::get('/games/delete/{id}', [GamesController::class, 'deleteGame'])->name('psycho.games.delete');
        Route::put('/games/edit/{id}', [GamesController::class, 'updateGame'])->name('psycho.games.update');
        Route::get('/games/assign/{id}', [AssignController::class, 'showUsers'])->name('psycho.games.show-users');
        Route::post('/games/assign/{id}', [AssignController::class, 'assignUsers'])->name('assign-users');

        //Rutas Juegos Tests
        Route::get('/games/tests', [GamesController::class, 'testsIndex'])->name('psycho.games.tests.index');
        Route::get('/games/tests/create', [GamesController::class, 'testsCreateIndex'])->name('psycho.games.tests.create');
        Route::post('/games/tests/create', [GamesController::class, 'createTest'])->name('psycho.games.tests.store');
        Route::get('games/tests/add-games', [GamesController::class, 'addGamesToTestIndex'])->name('psycho.games.tests.add-games');
        Route::post('games/tests/add-games', [GamesController::class, 'addGamesToTest'])->name('psycho.games.tests.add-games.store');
        Route::get('games/tests/edit/{id}', [GamesController::class, 'testsEditIndex'])->name('psycho.games.tests.edit');
        Route::put('games/tests/edit/{id}', [GamesController::class, 'updateTest'])->name('psycho.games.tests.update');
    });
});
