<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstantController;
use Modules\Support\Http\Controllers\ReplyController;
use Modules\Support\Http\Controllers\TicketController;
use Modules\Support\Http\Controllers\PriorityController;
use Modules\Support\Http\Controllers\TicketCategoryController;

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

Route::group(['prefix' => 'dashboard/support/', 'as'=>'support.', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/', 'SupportController@index')->name('index');
    Route::post('/', 'SupportController@store')->name('store');
    Route::get('/edit/{id}', 'SupportController@edit')->name('edit');

    Route::group(['as'=>'category.', 'prefix'=>'category'], function($routes){
        $routes->get('/', [TicketCategoryController::class, 'index'])->name('index');
        $routes->post('/', [TicketCategoryController::class, 'store'])->name('store');
        $routes->get('/edit/{id}', [TicketCategoryController::class, 'edit'])->name('edit');
        $routes->post('/update', [TicketCategoryController::class, 'update'])->name('update');
        $routes->get('/delete/{id}', [TicketCategoryController::class, 'destroy'])->name('destroy');
    });
    Route::group(['as'=>'ticket.', 'prefix'=>'ticket'], function($routes){
        $routes->get('/', [TicketController::class, 'index'])->name('index');
        $routes->get('/create', [TicketController::class, 'create'])->name('create');
        $routes->post('/', [TicketController::class, 'store'])->name('store');
        $routes->get('/edit/{id}', [TicketController::class, 'edit'])->name('edit');    
        $routes->get('/show/{id}', [TicketController::class, 'show'])->name('show');
        $routes->post('/update', [TicketController::class, 'update'])->name('update');
        $routes->post('/update/status', [TicketController::class, 'updateStatus'])->name('updateStatus');
        $routes->get('/delete/{id}', [TicketController::class, 'destroy'])->name('destroy');
    });
    Route::group(['as'=>'reply.', 'prefix'=>'reply'], function($routes){
        $routes->get('/{id}', [ReplyController::class, 'index'])->name('index');
        $routes->get('/create', [ReplyController::class, 'create'])->name('create');
        $routes->post('/', [ReplyController::class, 'store'])->name('store');
        $routes->get('/edit/{id}', [ReplyController::class, 'edit'])->name('edit');
        $routes->get('/show/{id}', [ReplyController::class, 'show'])->name('show');
        $routes->post('/update', [ReplyController::class, 'update'])->name('update');
        $routes->get('/delete/{id}', [ReplyController::class, 'destroy'])->name('destroy');
    });
    Route::group(['as'=>'priority.', 'prefix'=>'priority'], function($routes){
        $routes->get('/', [PriorityController::class, 'index'])->name('index');
        $routes->post('/', [PriorityController::class, 'store'])->name('store');
        $routes->get('/edit/{id}', [PriorityController::class, 'edit'])->name('edit');
        $routes->post('/update', [PriorityController::class, 'update'])->name('update');
        $routes->get('/delete/{id}', [PriorityController::class, 'destroy'])->name('destroy');
    });

});
