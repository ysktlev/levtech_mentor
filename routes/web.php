<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(["middleware" => ["auth"]], function() {
    Route::get("/posts", [PostController::class, "index"])->name('index');
    Route::get("/posts/create", [PostController::class, "create"])->name('create');
    Route::post("/posts", [PostController::class, "store"])->name('store');
    Route::get("/posts/{post}", [PostController::class, "show"])->name('show');
    Route::get('/posts/{post}/edit', [PostController::class, "edit"])->name('edit');
    Route::put('/posts/{post}', [PostController::class, "update"])->name('update');
    Route::delete("/posts/{post}", [PostController::class, "delete"])->name('delete');
 });

require __DIR__.'/auth.php';
