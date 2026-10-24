<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthPageController;
use App\Http\Controllers\Web\PublicSiteController;
use App\Http\Controllers\Web\SessionController;
use App\Http\Middleware\WebStaff;
use Illuminate\Support\Facades\Route;

// The same controllers, permissions and tenant checks as the external API,
// with Laravel's web session and CSRF middleware for the Blade application.
Route::prefix('web-api')->name('web.')->middleware(\App\Http\Middleware\NormalizeIdentity::class)->group(base_path('routes/api.php'));
Route::post('/session/login', [SessionController::class, 'login'])->middleware('throttle:auth');
Route::post('/session/verify', [SessionController::class, 'verify'])->middleware('throttle:auth');
Route::post('/session/logout', [SessionController::class, 'logout']);
Route::get('/login', [AuthPageController::class, 'login'])->name('login');
Route::get('/register', [AuthPageController::class, 'register']);
Route::get('/panel/admin/login', [AuthPageController::class, 'staff']);
Route::get('/county-admin/{slug}/login', [AuthPageController::class, 'county'])->where('slug', '[a-z0-9-]+');
Route::get('/county-admin/{slug}', [AdminController::class, 'county'])->middleware(WebStaff::class)->where('slug', '[a-z0-9-]+');
Route::get('/panel/admin/{path?}', [AdminController::class, 'show'])->middleware(WebStaff::class)->where('path', '.*');
Route::get('/citizen', [AuthPageController::class, 'citizen']);
Route::get('/{path?}', PublicSiteController::class)->where('path', '.*');
