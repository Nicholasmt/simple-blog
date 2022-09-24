<?php

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

// Route::get('/', function () {
//     return view('blog');
// });

 

Route::get('/', [App\Http\Controllers\BlogPostController::class, 'index'])->name('blog-posts');

Route::post('blog-admin/auth', [App\Http\Controllers\IndexController::class, 'authentication'])->name('blog-adminAuth');
Route::get('redirectAuth', [App\Http\Controllers\IndexController::class, 'redirect'])->name('redirectAuth');
Route::get('logout', [App\Http\Controllers\IndexController::class, 'logout'])->name('app-logout');


Route::group(['prefix'=>'kt-admin' ,'as'=>'kt-admin'], function(){

    Route::get('create', [App\Http\Controllers\KtAdminController::class, 'create'])->name('create');
    Route::post('store', [App\Http\Controllers\KtAdminController::class, 'store'])->name('store');
    Route::get('blog-admins', [App\Http\Controllers\KtAdminController::class, 'blog_admins'])->name('blog-admin');

});
 
Route::group(['prefix'=>'blog-admin' ,'as'=>'blog-admin','middleware'=>'blog-admin'], function(){

    Route::get('posts', [App\Http\Controllers\BlogAdminController::class, 'index'])->name('-posts');
    Route::post('add-post', [App\Http\Controllers\BlogAdminController::class, 'store'])->name('-addPosts');
     
});