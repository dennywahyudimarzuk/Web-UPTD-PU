<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\GalleryVideoController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsTagsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IdentityWebsiteController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BannerController;

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

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'checkStatus', 'prevent-back-history'])->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('/users', UsersController::class)->except([
            'create',
            'show'
        ]);
        Route::patch('/users/changed/{user}/{status}', [UsersController::class, 'changed'])->name('users.changed');
        Route::patch('/users/changed-password/{user}', [UsersController::class, 'changedPassword'])->name('users.changed-password');
        Route::resource('news', NewsController::class)->except([
            'show'
        ]);
        Route::resource('setting', IdentityWebsiteController::class)->except([
            'show'
        ]);
        Route::resource('page', PageController::class)->except([
            'show'
        ]);
        Route::patch('/news/changed/{news}/{status}', [NewsController::class, 'changed'])->name('news.changed');

        Route::resource('/category', NewsCategoryController::class)->except([
            'show'
        ]);

        Route::resource('/banner', BannerController::class)->except([
            'show'
        ]);
        Route::patch('/banner/changed/{banner}/{status}', [BannerController::class, 'changed'])->name('banner.changed');

        Route::patch('/category/changed/{category}/{status}', [NewsCategoryController::class, 'changed'])->name('category.changed');

        Route::resource('/menu', MenuController::class)->except([
            'create',
            'show'
        ]);
        Route::patch('/menu/changed/{menu}/{status}', [MenuController::class, 'changed'])->name('menu.changed');

        Route::resource('/gallery/image', GalleryImageController::class);
        Route::patch('/gallery/image/changed/{image}/{status}', [GalleryImageController::class, 'changed'])->name('image.changed');

        Route::resource('/gallery/video', GalleryVideoController::class);
        Route::patch('/gallery/video/changed/{video}/{status}', [GalleryVideoController::class, 'changed'])->name('video.changed');
        
        Route::get('/information-list/{pg}', [InformationController::class, 'index'])->name('information-list.index');
        Route::post('/information/{pg}', [InformationController::class, 'store'])->name('information.store');
        Route::get('/information/{pg}/{information}/edit', [InformationController::class, 'edit'])->name('information.edit');
        Route::patch('/information/{pg}/{information}', [InformationController::class, 'update'])->name('information.update');
        Route::delete('/information/{pg}/{information}', [InformationController::class, 'destroy'])->name('information.destroy');
        // Route::resource('/information', InformationController::class);
        Route::patch('/information/changed/{information}/{status}', [InformationController::class, 'changed'])->name('information.changed');

        Route::resource('/agenda', AgendaController::class);
        Route::patch('/agenda/changed/{agenda}/{status}', [AgendaController::class, 'changed'])->name('agenda.changed');

        Route::resource('/input', InputController::class);
    });
});

Route::get('/locale', [LocalizationController::class, 'index'])->name('locale');

require __DIR__ . '/frontend.php';
