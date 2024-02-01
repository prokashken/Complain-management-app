<?php

use App\Http\Controllers\EditRegistrationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\MakepdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupperController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForwardTicketController;
use App\Http\Controllers\ItemController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home2/{id}', function ($id) {
    return view('home2',compact('id'));
});

Route::middleware('auth','verified')->group(function () {
    
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('ticket/create', [TicketController::class,'store'])->name('ticket.create');
    Route::post('item/create', [ItemController::class,'store'])->name('item.create');
    Route::post('add/pir', [ItemController::class,'addPIR'])->name('add.pir');
    Route::post('/ticket/{id}', [TicketController::class,'update']);
    Route::get('/closed-tickets', [UserController::class, 'closedTicket']);
    Route::get('/item-lists/{id}', [ItemController::class, 'itemLists']);
    Route::get('edititem/{id}', [ItemController::class, 'edit']);
    Route::post('/item-update/{id}', [ItemController::class,'update']);
    Route::post('/item-edit-request', [ItemController::class,'editReasonUpdate'])->name('edit.reason');
    Route::post('/item-edit-permission', [ItemController::class,'editPermissionUpdate'])->name('edit.permission');
    Route::post('/delete-item/{id}', [ItemController::class, 'destroy']);
    Route::get('/get/equip_info/{id}', [ItemController::class,'getInfo']);
    Route::get('/get/equip_info2/{id}', [ItemController::class,'getInfo2']);
    Route::get('/get/user_info/{id}', [UserController::class,'getInfo']);


});

Route::middleware('auth','verified',OnlyAdmin::class)->group(function () {
//Admin
    Route::get('/adhome', [SupperController::class, 'index'])->name('adhome');
    Route::get('/emplist', [SupperController::class, 'emplist']);
    Route::get('/amcrequirelist', [SupperController::class, 'amcRequirList']);
    Route::get('/amclist', [SupperController::class, 'amcList']);
    Route::get('amcrenew/{id}', [SupperController::class,'amcedit']);
    Route::post('amcrenew/{id}', [SupperController::class,'amcupdate']);
    Route::get('amcrgenerate/{id}', [SupperController::class,'amcGeneratEdit']);
    Route::post('amcrgenerate/{id}', [SupperController::class,'amcGeneratUpdate']);
    Route::post('/delete-employee/{id}', [SupperController::class,'deleteEmp']);

    Route::get('ticket/list', [SupperController::class, 'list'])->name('ticket.list');

    Route::get('/all-closed-tickets', [SupperController::class, 'closedTicket']);
    Route::post('subadmin/create', [SupperController::class,'store'])->name('subadmin.create');
    Route::post('subadmin/delete', [SupperController::class,'delete'])->name('subadmin.delete');
    Route::post('subadmin/error-create', [ErrorController::class,'store'])->name('subadmin.errorCreate');
    Route::get('subadmin/edit/{id}', [SupperController::class,'edit']);
    Route::post('subadmin/{id}', [SupperController::class,'updateSubAdmin']);
    Route::get('bar-chart', [SupperController::class,'charIndex']);
    // Route::get('bar-chart-data',[SupperController::class,'getBarChartData']);
    Route::post('bar-chart/data',[SupperController::class,'getBarChartData']);
    Route::get('/makepdf', [MakepdfController::class, 'showData']);
    Route::get('/makepdf/pdf', [MakepdfController::class, 'createPDF']);

    Route::post('/forward-ticket', [ForwardTicketController::class,'store'])->name('ticket.forward');
    Route::get('/forwardlist', [ForwardTicketController::class, 'ticketForwardList']);

    Route::get('/editUserRegi', [EditRegistrationController::class, 'edit']);
    Route::post('/update-RegiForm', [EditRegistrationController::class,'store']);
    Route::post('/update-ItemForm', [EditRegistrationController::class,'storeItem']);
    Route::post('/update-TicketForm', [EditRegistrationController::class,'storeTicket']);

    Route::get('/get/subadminInfo/{id}', [ForwardTicketController::class,'getInfo']);
    
    });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/verification/{id}',[UserController::class,'verification']);
Route::post('/verified',[UserController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[UserController::class,'resendOtp'])->name('resendOtp');

require __DIR__.'/auth.php';
