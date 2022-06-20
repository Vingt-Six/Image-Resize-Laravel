<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PictureController;
use App\Models\Picture;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

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

Route::get('/dashboard', function () {
    $images = Picture::all()->take(3);
    return view('dashboard', compact('images'));
})->middleware(['auth'])->name('dashboard');

Route::resource('image', PictureController::class);

require __DIR__.'/auth.php';
