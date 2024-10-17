<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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
//     return view('welcome');
// });

Route::group(['prefix' => '/' ] , function () {
    Route::get('',[PostController::class,'index']) ->name('Post.index');
    Route::get('show/{id}',[PostController::class,'show']) ->name('Post.show');


    Route::get('create',[PostController::class,'create']) ->name('Post.create');
    Route::post('store',[PostController::class,'store']) ->name('Post.store');

    Route::get('edit/{id}',[PostController::class,'edit']) ->name('Post.edit');
    Route::post('update/{id}',[PostController::class,'update']) ->name('Post.update');

    Route::get('delete/{id}',[PostController::class,'delete']) ->name('Post.delete');


});