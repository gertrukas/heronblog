<?php

use App\Http\Controllers\Api\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Livewire\Global\User\UserProfile;
use Illuminate\Support\Facades\Artisan;

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
Route::get('clear-caches', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('blogs', [BlogController::class, 'index'])->name('posts.index');
Route::get('blogs/{slug}', [BlogController::class, 'show'])->name('posts.show');


Route::view('aviso-de-privacidad', 'front/aviso', ['title' => 'Aviso de privacidad']);


Route::controller(AuthController::class)->middleware(['loggedin', 'Banned'])->group(function () {
    Route::post('login', 'login')->name('login.check');
    Route::get('login', 'loginView')->name('login.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile/user', UserProfile::class)->name('users.profile');
});

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::post('images/upload', [ImageController::class, 'upload'])->name('upload.image');

Route::post('/flmngr', function () {

    \EdSDK\FlmngrServer\FlmngrServer::flmngrRequest(
        array(
            'dirFiles' => base_path() . '/public/uploads/blog/'
        )
    );

});