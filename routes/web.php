<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArriveController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CaptainController;
use App\Http\Controllers\OurDataController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SenderDataController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReceiverDataController;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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




Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('addresses', AddressController::class);
        Route::resource('profiles', ProfileController::class);
        Route::resource('arrives', ArriveController::class);
        Route::resource('shipments', ShipmentController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('histories', HistoryController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('messages', MessageController::class);
        Route::get('all-receiver-data', [
            ReceiverDataController::class,
            'index',
        ])->name('all-receiver-data.index');
        Route::post('all-receiver-data', [
            ReceiverDataController::class,
            'store',
        ])->name('all-receiver-data.store');
        Route::get('all-receiver-data/create', [
            ReceiverDataController::class,
            'create',
        ])->name('all-receiver-data.create');
        Route::get('all-receiver-data/{receiverData}', [
            ReceiverDataController::class,
            'show',
        ])->name('all-receiver-data.show');
        Route::get('all-receiver-data/{receiverData}/edit', [
            ReceiverDataController::class,
            'edit',
        ])->name('all-receiver-data.edit');
        Route::put('all-receiver-data/{receiverData}', [
            ReceiverDataController::class,
            'update',
        ])->name('all-receiver-data.update');
        Route::delete('all-receiver-data/{receiverData}', [
            ReceiverDataController::class,
            'destroy',
        ])->name('all-receiver-data.destroy');

        Route::get('all-sender-data', [
            SenderDataController::class,
            'index',
        ])->name('all-sender-data.index');
        Route::post('all-sender-data', [
            SenderDataController::class,
            'store',
        ])->name('all-sender-data.store');
        Route::get('all-sender-data/create', [
            SenderDataController::class,
            'create',
        ])->name('all-sender-data.create');
        Route::get('all-sender-data/{senderData}', [
            SenderDataController::class,
            'show',
        ])->name('all-sender-data.show');
        Route::get('all-sender-data/{senderData}/edit', [
            SenderDataController::class,
            'edit',
        ])->name('all-sender-data.edit');
        Route::put('all-sender-data/{senderData}', [
            SenderDataController::class,
            'update',
        ])->name('all-sender-data.update');
        Route::delete('all-sender-data/{senderData}', [
            SenderDataController::class,
            'destroy',
        ])->name('all-sender-data.destroy');

        Route::resource('vehicles', VehicleController::class);
        Route::resource('captains', CaptainController::class);
        Route::get('all-our-data', [OurDataController::class, 'index'])->name(
            'all-our-data.index'
        );
        Route::post('all-our-data', [OurDataController::class, 'store'])->name(
            'all-our-data.store'
        );
        Route::get('all-our-data/create', [
            OurDataController::class,
            'create',
        ])->name('all-our-data.create');
        Route::get('all-our-data/{ourData}', [
            OurDataController::class,
            'show',
        ])->name('all-our-data.show');
        Route::get('all-our-data/{ourData}/edit', [
            OurDataController::class,
            'edit',
        ])->name('all-our-data.edit');
        Route::put('all-our-data/{ourData}', [
            OurDataController::class,
            'update',
        ])->name('all-our-data.update');
        Route::delete('all-our-data/{ourData}', [
            OurDataController::class,
            'destroy',
        ])->name('all-our-data.destroy');

        Route::resource('users', UserController::class);

        Route::get('/captain/register', [CaptainController::class, 'showRegistrationForm'])->name('captain.register');
        Route::post('/captain/register', [CaptainController::class, 'register']);
    });

    });