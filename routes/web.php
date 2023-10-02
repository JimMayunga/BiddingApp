<?php

use App\Http\Controllers\Controller;
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


Route::get('/', [Controller::class, 'gotoWelcome'])->name('welcome');
Route::get('/login', [Controller::class, 'gotoLogin'])->name('goto_login');
Route::get('/register', [Controller::class, 'gotoRegister'])->name('goto_register');
Route::get('/products', [Controller::class, 'gotoProducts'])->name('goto_products');
Route::get('/logout', [Controller::class, 'logout'])->name('logout_user');
Route::prefix('auth')->group(function () {
    Route::post('/login', [Controller::class, 'loginUser'])->name('login_user');
    Route::post('/register', [Controller::class, 'registerUser'])->name('register_user');
});

Route::prefix('product')->group(function () {
    Route::get('/new', [Controller::class, 'gotoNewProductForm' ])->name('goto_new_product_form');
    Route::post('/create', [Controller::class, 'createProduct'])->name('create_product');
    Route::get('/{id}', [Controller::class, 'gotoProduct'])->name('goto_product');
});
