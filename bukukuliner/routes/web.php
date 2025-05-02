<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Admin\RecipeAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::post('/bookmark/{id}', [BookmarkController::class, 'store'])->name('bookmark.store');
Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmark.index');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'remove'])->name('bookmark.remove');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('admin')->group(function () {
    Route::get('/recipes', [RecipeAdminController::class, 'index'])->name('admin.recipes.index');
    Route::get('/recipes/create', [RecipeAdminController::class, 'create'])->name('admin.recipes.create');
    Route::post('/recipes', [RecipeAdminController::class, 'store'])->name('admin.recipes.store');
    Route::get('/recipes/{id}/edit', [RecipeAdminController::class, 'edit'])->name('admin.recipes.edit');
    Route::put('/recipes/{id}', [RecipeAdminController::class, 'update'])->name('admin.recipes.update');
    Route::delete('/recipes/{id}', [RecipeAdminController::class, 'destroy'])->name('admin.recipes.destroy');
});
