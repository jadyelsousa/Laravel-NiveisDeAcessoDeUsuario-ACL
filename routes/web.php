<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/connection',[LoginController::class,'loginView']);

Route::post('/connection',[LoginController::class,'loginPost']);

Route::get('/logout',[LoginController::class,'logout']);

Route::get('/dashboard', function ( Post $post) {
    $posts = $post->paginate(2);
    return view('dashboard', compact('posts'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/search', [Controller::class,'search'])->name('search');

Route::get('/post/{id}/update',[Controller::class,'update']);

Route::get('/roles-permissions', [Controller::class,'rolesPermissions']);

Route::get('/cad-permission', [Controller::class,'indexPermission'])->middleware('auth')->name('cadpermission');

Route::post('/cad-permission', [Controller::class,'storePermission'])->middleware('auth')->name('envcardpermission');


