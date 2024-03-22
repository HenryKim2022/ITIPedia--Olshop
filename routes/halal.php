<?php

use App\Http\Controllers\Backend\Appearance\Halal\ClientFeedbackController;
use App\Http\Controllers\Backend\Appearance\Halal\HeroController;
use App\Http\Controllers\Backend\Appearance\Halal\HomepageController;
use App\Http\Controllers\Backend\Appearance\Halal\TopCategoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halal Theme Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function () {  
        # appearance
        Route::group(['prefix' => 'appearance/halal'], function () {

            # homepage - hero
            Route::get('/homepage/hero', [HeroController::class, 'hero'])->name('admin.appearance.halal.homepage.hero'); 

            # homepage - top category 
            Route::get('/homepage/top-category', [TopCategoriesController::class, 'index'])->name('admin.appearance.halal.homepage.topCategories');

            # homepage - about us 
            Route::get('/homepage/about-us', [HomepageController::class, 'aboutUs'])->name('admin.appearance.halal.homepage.aboutUs');

            # homepage - features
            Route::get('/homepage/features', [HomepageController::class, 'features'])->name('admin.appearance.halal.homepage.features');
          
            # homepage - popular
            Route::get('/homepage/popular', [HomepageController::class, 'popular'])->name('admin.appearance.halal.homepage.popular');
            
            # homepage - whyChooseUs
            Route::get('/homepage/why-choose-us', [HomepageController::class, 'whyChooseUs'])->name('admin.appearance.halal.homepage.whyChooseUs');
            
            # client feedback
            Route::get('/homepage/client-feedback', [ClientFeedbackController::class, 'index'])->name('admin.appearance.halal.homepage.clientFeedback');
            Route::post('/homepage/client-feedback', [ClientFeedbackController::class, 'store'])->name('admin.appearance.halal.homepage.storeClientFeedback');
            Route::get('/homepage/client-feedback/edit/{id}', [ClientFeedbackController::class, 'edit'])->name('admin.appearance.halal.homepage.editClientFeedback');
            Route::post('/homepage/client-feedback/update', [ClientFeedbackController::class, 'update'])->name('admin.appearance.halal.homepage.updateClientFeedback');
            Route::get('/homepage/client-feedback/delete/{id}', [ClientFeedbackController::class, 'delete'])->name('admin.appearance.halal.homepage.deleteClientFeedback');
            
            # homepage - onSaleProducts
            Route::get('/homepage/on-sale-products', [HomepageController::class, 'onSaleProducts'])->name('admin.appearance.halal.homepage.onSaleProducts');
            
            # homepage - blogs
            Route::get('/homepage/blogs', [HomepageController::class, 'blogs'])->name('admin.appearance.halal.homepage.blogs');
        }); 
        
    }
);
