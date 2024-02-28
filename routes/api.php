<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ArriveController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\CaptainController;
use App\Http\Controllers\Api\OurDataController;
use App\Http\Controllers\Api\ShipmentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\SenderDataController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserArrivesController;
use App\Http\Controllers\Api\ReceiverDataController;
use App\Http\Controllers\Api\UserShipmentsController;
use App\Http\Controllers\Api\UserAddressesController;
use App\Http\Controllers\Api\AddressArrivesController;
use App\Http\Controllers\Api\VehicleArrivesController;
use App\Http\Controllers\Api\CaptainArrivesController;
use App\Http\Controllers\Api\LocationArrivesController;
use App\Http\Controllers\Api\VehicleCaptainsController;
use App\Http\Controllers\Api\AddressShipmentsController;
use App\Http\Controllers\Api\VehicleShipmentsController;
use App\Http\Controllers\Api\CaptainShipmentsController;
use App\Http\Controllers\Api\CategoryShipmentsController;
use App\Http\Controllers\Api\LocationShipmentsController;
use App\Http\Controllers\Api\SenderDataShipmentsController;
use App\Http\Controllers\Api\ReceiverDataShipmentsController;
use App\Http\Controllers\SmsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');

Route::get('/captain/register', [CaptainController::class, 'showRegistrationForm'])->name('captain.register');
Route::post('/captain/register', [CaptainController::class, 'register']);



Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })->name('api.user');


Route::post('/send-sms', [AuthController::class, 'sms']);
Route::post('sendSms', [SmsController::class, 'sendSms']);

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('addresses', AddressController::class);

        // Address Shipments
        Route::get('/addresses/{address}/shipments', [
            AddressShipmentsController::class,
            'index',
        ])->name('addresses.shipments.index');
        Route::post('/addresses/{address}/shipments', [
            AddressShipmentsController::class,
            'store',
        ])->name('addresses.shipments.store');

        // Address Arrives
        Route::get('/addresses/{address}/arrives', [
            AddressArrivesController::class,
            'index',
        ])->name('addresses.arrives.index');
        Route::post('/addresses/{address}/arrives', [
            AddressArrivesController::class,
            'store',
        ])->name('addresses.arrives.store');

        Route::apiResource('profiles', ProfileController::class);

        Route::apiResource('arrives', ArriveController::class);

        Route::apiResource('shipments', ShipmentController::class);

        Route::apiResource('categories', CategoryController::class);

        // Category Shipments
        Route::get('/categories/{category}/shipments', [
            CategoryShipmentsController::class,
            'index',
        ])->name('categories.shipments.index');
        Route::post('/categories/{category}/shipments', [
            CategoryShipmentsController::class,
            'store',
        ])->name('categories.shipments.store');

        Route::apiResource('histories', HistoryController::class);

        Route::apiResource('locations', LocationController::class);

        // Location Shipments
        Route::get('/locations/{location}/shipments', [
            LocationShipmentsController::class,
            'index',
        ])->name('locations.shipments.index');
        Route::post('/locations/{location}/shipments', [
            LocationShipmentsController::class,
            'store',
        ])->name('locations.shipments.store');

        // Location Arrives
        Route::get('/locations/{location}/arrives', [
            LocationArrivesController::class,
            'index',
        ])->name('locations.arrives.index');
        Route::post('/locations/{location}/arrives', [
            LocationArrivesController::class,
            'store',
        ])->name('locations.arrives.store');

        Route::apiResource('messages', MessageController::class);

        Route::apiResource('all-receiver-data', ReceiverDataController::class);

        // ReceiverData Shipments
        Route::get('/all-receiver-data/{receiverData}/shipments', [
            ReceiverDataShipmentsController::class,
            'index',
        ])->name('all-receiver-data.shipments.index');
        Route::post('/all-receiver-data/{receiverData}/shipments', [
            ReceiverDataShipmentsController::class,
            'store',
        ])->name('all-receiver-data.shipments.store');

        Route::apiResource('all-sender-data', SenderDataController::class);

        // SenderData Shipments
        Route::get('/all-sender-data/{senderData}/shipments', [
            SenderDataShipmentsController::class,
            'index',
        ])->name('all-sender-data.shipments.index');
        Route::post('/all-sender-data/{senderData}/shipments', [
            SenderDataShipmentsController::class,
            'store',
        ])->name('all-sender-data.shipments.store');

        Route::apiResource('vehicles', VehicleController::class);

        // Vehicle Shipments
        Route::get('/vehicles/{vehicle}/shipments', [
            VehicleShipmentsController::class,
            'index',
        ])->name('vehicles.shipments.index');
        Route::post('/vehicles/{vehicle}/shipments', [
            VehicleShipmentsController::class,
            'store',
        ])->name('vehicles.shipments.store');

        // Vehicle Captains
        Route::get('/vehicles/{vehicle}/captains', [
            VehicleCaptainsController::class,
            'index',
        ])->name('vehicles.captains.index');
        Route::post('/vehicles/{vehicle}/captains', [
            VehicleCaptainsController::class,
            'store',
        ])->name('vehicles.captains.store');

        // Vehicle Arrives
        Route::get('/vehicles/{vehicle}/arrives', [
            VehicleArrivesController::class,
            'index',
        ])->name('vehicles.arrives.index');
        Route::post('/vehicles/{vehicle}/arrives', [
            VehicleArrivesController::class,
            'store',
        ])->name('vehicles.arrives.store');

        Route::apiResource('captains', CaptainController::class);

        // Captain Shipments
        Route::get('/captains/{captain}/shipments', [
            CaptainShipmentsController::class,
            'index',
        ])->name('captains.shipments.index');
        Route::post('/captains/{captain}/shipments', [
            CaptainShipmentsController::class,
            'store',
        ])->name('captains.shipments.store');

        // Captain Arrives
        Route::get('/captains/{captain}/arrives', [
            CaptainArrivesController::class,
            'index',
        ])->name('captains.arrives.index');
        Route::post('/captains/{captain}/arrives', [
            CaptainArrivesController::class,
            'store',
        ])->name('captains.arrives.store');

        Route::apiResource('all-our-data', OurDataController::class);

        Route::apiResource('users', UserController::class);

        // User Shipments
        Route::get('/users/{user}/shipments', [
            UserShipmentsController::class,
            'index',
        ])->name('users.shipments.index');
        Route::post('/users/{user}/shipments', [
            UserShipmentsController::class,
            'store',
        ])->name('users.shipments.store');

        // User Addresses
        Route::get('/users/{user}/addresses', [UserAddressesController::class, 'index',])->name('users.addresses.index');



        Route::post('/users/{user}/addresses', [
            UserAddressesController::class,
            'store',
        ])->name('users.addresses.store');

        // User Arrives
        Route::get('/users/{user}/arrives', [
            UserArrivesController::class,
            'index',
        ])->name('users.arrives.index');
        Route::post('/users/{user}/arrives', [
            UserArrivesController::class,
            'store',
        ])->name('users.arrives.store');
    });