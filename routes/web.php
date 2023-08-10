<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\View\MessageController;
use App\Http\Controllers\View\SiteController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });
    Route::group(['middleware' => 'notLogin'], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/account', [AuthController::class, 'edit'])->name('account.edit');
        Route::post('/account', [AuthController::class, 'update'])->name('account.update');
        
        Route::resource('users', UserController::class);

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
        
        Route::resource('menu', MenuController::class);
        Route::get('/menu-sort', [MenuController::class, 'sort'])->name('menu.sort');

        Route::get('/banner', [BannerController::class, 'index'])->name('banner');
        Route::post('/banner', [BannerController::class, 'update'])->name('banner.update');

        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::post('/about', [AboutController::class, 'update'])->name('about.update');

        Route::resource('skills', SkillController::class);
        Route::get('/skills-sort', [SkillController::class, 'sort'])->name('skills.sort');

        Route::resource('project-categories', ProjectCategoryController::class);
        Route::get('/project-categories-sort', [ProjectCategoryController::class, 'sort'])->name('project-categories.sort');

        Route::resource('projects', ProjectController::class);
        Route::get('/projects-sort', [ProjectController::class, 'sort'])->name('projects.sort');

        Route::resource('experience', ExperienceController::class);
        Route::get('/experience-sort', [ExperienceController::class, 'sort'])->name('experience.sort');

        Route::resource('education', EducationController::class);
        Route::get('/education-sort', [EducationController::class, 'sort'])->name('education.sort');

        Route::resource('messages', AdminMessageController::class);
        Route::post('/send-message', [AdminMessageController::class, 'send'])->name('messages.send');
    });
});


Route::get('/', [SiteController::class, 'index'])->name('index');
Route::post('/send-message', [MessageController::class, 'send'])->name('index.send-msg');
