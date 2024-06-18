<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/', function () {
//     return view('/component.index');
// });

Route::get('/home', [FrontendController::class, 'index']);
Route::get('/book', [DashboardController::class, 'books']);
Route::post('/book', [DashboardController::class, 'inputBooks'])->name('inputBooks');
Route::put('/book/{id}', [DashboardController::class, 'editBooks'])->name('editBooks');
Route::delete('/book/{id}', [DashboardController::class, 'deleteBooks'])->name('deleteBooks');


Route::get('/author', [DashboardController::class, 'authors'])->name('viewAllAuthors');
Route::post('/author', [DashboardController::class, 'inputAuthors'])->name('inputAuthors');
Route::put('/author/{id}', [DashboardController::class, 'editAuthor'])->name('editAuthor');
Route::delete('/author/{id}', [DashboardController::class, 'deleteAuthor'])->name('deleteAuthor');


Route::get('/publisher', [DashboardController::class, 'publisher']);
Route::post('/publisher', [DashboardController::class, 'savePublisher'])->name('savePublisher');
Route::put('/publisher/{id}', [DashboardController::class, 'editPublisher'])->name('editPublisher');
Route::delete('/publisher/{id}', [DashboardController::class, 'deletePublisher'])->name('deletePublisher');

Route::get('/categories', [DashboardController::class, 'categories']);
Route::post('/categories', [DashboardController::class, 'inputCategories'])->name('inputCategories');
Route::put('/categories/{idkategori}', [DashboardController::class, 'editCategories'])->name('editcat');
Route::delete('/categories/{idkategori}', [DashboardController::class, 'deleteCategories'])->name('deletecat');


Route::get('/borrow', [DashboardController::class, 'borrow'])->name('books.borrow');
Route::post('/borrow', [DashboardController::class, 'inputBorrow'])->name('books.borrow.input');


Route::get('/statusBorrow', [DashboardController::class, 'statusIndex']);
Route::put('/statusBorrow{id}', [DashboardController::class, 'changeStatus'])->name('borrow.change');
Route::delete('/statusBorrow/{id}', [DashboardController::class, 'deleteStatus'])->name('borrow.delete');

Route::get('/user', [DashboardController::class, 'user']);
Route::post('/user', [DashboardController::class, 'userInput'])->name('user.input');
Route::put('/user/{id}', [DashboardController::class, 'changeInput'])->name('user.change');
Route::delete('/user/{id}', [DashboardController::class, 'deleteInput'])->name('user.delete');


Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'Login']);
Route::post('/logout', [LoginController::class, 'logout']);

// forget password
Route::get('/forget-password', [ForgotPasswordController::class, 'index']);
Route::post('/forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('resetPassword');
