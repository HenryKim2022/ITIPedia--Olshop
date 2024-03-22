<?php

use App\Http\Controllers\Backend\Deliverymen\DeliverymenController;
use App\Http\Controllers\Backend\Orders\OrdersController;
use App\Http\Controllers\Deliveryman\DashboardController;
use App\Http\Controllers\Deliveryman\DeliveryOrdersController;
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
 

Route::group(
    ['prefix' => 'deliveryman', 'middleware' => ['auth', 'deliveryman']],
    function () {
        # dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('deliveryman.dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('deliveryman.profile');
        Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('deliveryman.profile.update'); 
        
        # orders
        Route::group(['prefix' => 'orders'],
            function () { 
                Route::get('/details/{id}', [DeliveryOrdersController::class, 'show'])->name('deliveryman.show');
                Route::get('/assigned', [DeliveryOrdersController::class, 'assigned'])->name('deliveryman.assigned');   
                Route::get('/picked-up', [DeliveryOrdersController::class, 'pickedUp'])->name('deliveryman.pickedUp');   
                Route::get('/out-for-delivery', [DeliveryOrdersController::class, 'outForDelivery'])->name('deliveryman.outForDelivery');   
                Route::get('/delivered', [DeliveryOrdersController::class, 'delivered'])->name('deliveryman.delivered');   
                Route::get('/cancelled', [DeliveryOrdersController::class, 'cancelled'])->name('deliveryman.cancelled');  

                Route::get('/earnings-history', [DeliveryOrdersController::class, 'earningHistory'])->name('deliveryman.earning-history');  
                
                # updateDeliveryStatus
                Route::post('/update-delivery-status', [DeliveryOrdersController::class, 'updateDeliveryStatus'])->name('deliveryman.updateDeliveryStatus');  
                Route::post('/cancel/orders/{order}', [DeliveryOrdersController::class, 'cancelOrder'])->name('deliveryman.cancel.order');  

                Route::get('payout-history',[DeliveryOrdersController::class,'payoutHistory'])->name('deliveryman.payout');
                Route::post('payout-history',[DeliveryOrdersController::class,'payoutRequest']);

                #downloadInvoice
                Route::get('/invoice-download/{id}', [OrdersController::class, 'downloadInvoice'])->name('deliveryman.downloadInvoice');
            }
        );     
    }
);
