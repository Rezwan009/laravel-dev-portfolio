<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\ProjectController;
use App\Http\Controllers\Api\Admin\BlogPostController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\TechnologyController;
use App\Http\Controllers\Api\Admin\TagController;
use App\Http\Controllers\Api\Admin\TestimonialController;
use App\Http\Controllers\Api\Admin\ContactMessageController;
use App\Http\Controllers\Api\Admin\SettingController;
use App\Http\Controllers\Api\Admin\EducationController;
use App\Http\Controllers\Api\Admin\ExperienceController;
use App\Http\Controllers\Api\Admin\VisitorLogController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::apiResource('projects', ProjectController::class);
        Route::apiResource('blog-posts', BlogPostController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('technologies', TechnologyController::class);
        Route::apiResource('tags', TagController::class);
        Route::apiResource('testimonials', TestimonialController::class);
        Route::apiResource('contact-messages', ContactMessageController::class);
        Route::apiResource('education', EducationController::class);
        Route::apiResource('experiences', ExperienceController::class);
        Route::apiResource('visitor-logs', VisitorLogController::class)->except(['store', 'update']);
        
        // Singletons
        Route::get('settings', [SettingController::class, 'index']);
        Route::put('settings', [SettingController::class, 'update']);
        Route::get('about', [\App\Http\Controllers\Api\Admin\AboutController::class, 'index']);
        Route::put('about', [\App\Http\Controllers\Api\Admin\AboutController::class, 'update']);

        // Missing Resources
        Route::apiResource('social-links', \App\Http\Controllers\Api\Admin\SocialLinkController::class);
        Route::apiResource('project-images', \App\Http\Controllers\Api\Admin\ProjectImageController::class)->except(['update']);
        Route::apiResource('seo-metas', \App\Http\Controllers\Api\Admin\SeoMetaController::class);
        Route::apiResource('section-controls', \App\Http\Controllers\Api\Admin\SectionControlController::class);
        Route::apiResource('newsletter-subscribers', \App\Http\Controllers\Api\Admin\NewsletterSubscriberController::class)->only(['index', 'destroy']);
    });
});

// Public Routes
Route::prefix('public')->group(function () {
    Route::get('projects', [\App\Http\Controllers\Api\PublicController::class, 'projects']);
    Route::get('projects/{slug}', [\App\Http\Controllers\Api\PublicController::class, 'projectDetails']);
    Route::get('blog-posts', [\App\Http\Controllers\Api\PublicController::class, 'blogPosts']);
    Route::get('blog-posts/{slug}', [\App\Http\Controllers\Api\PublicController::class, 'blogPostDetails']);
    Route::get('about', [\App\Http\Controllers\Api\PublicController::class, 'about']);
    Route::get('settings', [\App\Http\Controllers\Api\PublicController::class, 'settings']);
    Route::post('contact', [\App\Http\Controllers\Api\PublicController::class, 'submitContact']);
    Route::post('visitor-logs', [\App\Http\Controllers\Api\Admin\VisitorLogController::class, 'store']);
});
