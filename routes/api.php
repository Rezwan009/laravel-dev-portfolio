<?php

use App\Http\Controllers\Api\Admin\AboutController;
use App\Http\Controllers\Api\Admin\ServiceController;
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
use App\Http\Controllers\Api\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Api\Admin\ProjectImageController;
use App\Http\Controllers\Api\Admin\SectionControlController;
use App\Http\Controllers\Api\Admin\SeoMetaController;
use App\Http\Controllers\Api\Admin\SocialLinkController;
use App\Http\Controllers\Api\Admin\VisitorLogController;
use App\Http\Controllers\Api\PublicController;

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
        Route::get('settings', [SettingController::class, 'index']);
        Route::put('settings', [SettingController::class, 'update']);
        Route::get('about', [AboutController::class, 'index']);
        Route::put('about', [AboutController::class, 'update']);
        Route::apiResource('social-links', SocialLinkController::class);
        Route::apiResource('project-images', ProjectImageController::class)->except(['update']);
        Route::apiResource('services', ServiceController::class);
        Route::apiResource('seo-metas', SeoMetaController::class);
        Route::apiResource('section-controls', SectionControlController::class);
        Route::apiResource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);
    });
});

// Public Routes
Route::prefix('public')->group(function () {
    Route::get('projects', [PublicController::class, 'projects']);
    Route::get('projects/{slug}', [PublicController::class, 'projectDetails']);
    Route::get('blog-posts', [PublicController::class, 'blogPosts']);
    Route::get('blog-posts/{slug}', [PublicController::class, 'blogPostDetails']);
    Route::get('about', [PublicController::class, 'about']);
    Route::get('settings', [PublicController::class, 'settings']);
    Route::get('services', [PublicController::class, 'services']);
    Route::get('services/{slug}', [PublicController::class, 'serviceDetails']);
    Route::get('testimonials', [PublicController::class, 'testimonials']);
    Route::get('education', [PublicController::class, 'education']);
    Route::get('experiences', [PublicController::class, 'experience']);
    Route::get('social-links', [PublicController::class, 'socialLinks']);
    Route::post('contact', [PublicController::class, 'submitContact']);
    Route::post('visitor-logs', [VisitorLogController::class, 'store']);
});
