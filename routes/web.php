<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{LoginController, LogoutController, SettingController};
use App\Http\Controllers\Record\{DentalrecordController};
use App\Http\Controllers\Guest\{GuestController};
use App\Http\Controllers\Etc\{VillageController, TreatmentController, SchoolController, DiagnosaController};
use App\Http\Controllers\{HomeController, AboutController};
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function(){ 
    Route::get( '/login', [LoginController::class, 'formlogin']) -> name('login');
    Route::post( '/login', [LoginController::class, 'login']) -> name('login');
    Route::get( '/login2', [LoginController::class, 'formlogin2']) -> name('login2');
    Route::get( '/login3', [LoginController::class, 'formlogin3']) -> name('login3');
});

Route::middleware('auth','dentistguest')->group(function(){ 
    Route::get( '/guest', HomeController::class) -> name('guest');
    Route::get( '/guest/record-{year}', [GuestController::class, 'show']) -> name('guest.record');
});

Route::middleware('auth')->group(function(){ 
    Route::get( '/', HomeController::class) -> name('home');
    Route::get( '/about', AboutController::class) -> name('about');
    Route::post( '/logout', LogoutController::class) -> name('logout');
});
    
Route::middleware('auth','dentist')->group(function(){ 
    Route::get( '/dentist', HomeController::class) -> name('dentist');
    
    Route::get( '/setting', [SettingController::class, 'setting']) -> name('setting');
    Route::patch( '/password', [SettingController::class, 'password']) -> name('password');
    Route::patch( '/username', [SettingController::class, 'username']) -> name('username');
    Route::patch( '/photoprofile', [SettingController::class, 'photoprofile']) -> name('photoprofile');
    
    Route::get( '/dentist/record/{year}', [DentalrecordController::class, 'show']) -> name('dentist.record.year');
    Route::get( '/dentist/create', [DentalrecordController::class, 'create']) -> name('dentist.create');
    Route::post( '/dentist/create', [DentalrecordController::class, 'store']) -> name('dentist.create');
    Route::get( '/dentist/{id}/edit', [DentalrecordController::class, 'edit']) -> name('dentist.edit');
    Route::patch( '/dentist/{id}/edit', [DentalrecordController::class, 'update']) -> name('dentist.edit');
    Route::delete( '/dentist/{id}/delete', [DentalrecordController::class, 'destroy']) -> name('dentist.delete');
    Route::delete( '/dentist/{id}/delete-photo', [DentalrecordController::class, 'deletephoto']) -> name('dentist.delete.photo');
    
    Route::get( '/dentist/school', [SchoolController::class, 'index']) -> name('dentist.school');
    Route::post( '/dentist/school', [SchoolController::class, 'store']) -> name('dentist.school');
    Route::get( '/dentist/school/{id}/edit', [SchoolController::class, 'edit']) -> name('dentist.school.edit');
    Route::patch( '/dentist/school/{id}/edit', [SchoolController::class, 'update']) -> name('dentist.school.edit');
    Route::delete( '/dentist/school/{id}', [SchoolController::class, 'destroy']) -> name('dentist.school.delete');
    
    Route::get( '/dentist/village', [VillageController::class, 'index']) -> name('dentist.village');
    Route::post( '/dentist/village', [VillageController::class, 'store']) -> name('dentist.village');
    Route::get( '/dentist/village/{id}/edit', [VillageController::class, 'edit']) -> name('dentist.village.edit');
    Route::patch( '/dentist/village/{id}/edit', [VillageController::class, 'update']) -> name('dentist.village.edit');
    Route::delete( '/dentist/village/{id}', [VillageController::class, 'destroy']) -> name('dentist.village.delete');
    
    Route::get( '/dentist/diagnosa', [DiagnosaController::class, 'index']) -> name('dentist.diagnosa');
    Route::post( '/dentist/diagnosa', [DiagnosaController::class, 'store']) -> name('dentist.diagnosa');
    Route::get( '/dentist/diagnosa/{id}/edit', [DiagnosaController::class, 'edit']) -> name('dentist.diagnosa.edit');
    Route::patch( '/dentist/diagnosa/{id}/edit', [DiagnosaController::class, 'update']) -> name('dentist.diagnosa.edit');
    Route::patch( '/dentist/diagnosa/{id}/onoff', [DiagnosaController::class, 'onoff']) -> name('dentist.diagnosa.onoff');
    Route::delete( '/dentist/diagnosa/{id}', [DiagnosaController::class, 'destroy']) -> name('dentist.diagnosa.delete');
    
    Route::get( '/dentist/treatment', [TreatmentController::class, 'index']) -> name('dentist.treatment');
    Route::post( '/dentist/treatment', [TreatmentController::class, 'store']) -> name('dentist.treatment');
    Route::get( '/dentist/treatment/{id}/edit', [TreatmentController::class, 'edit']) -> name('dentist.treatment.edit');
    Route::patch( '/dentist/treatment/{id}/edit', [TreatmentController::class, 'update']) -> name('dentist.treatment.edit');
    Route::delete( '/dentist/treatment/{id}', [TreatmentController::class, 'destroy']) -> name('dentist.treatment.delete');
    
    Route::get( '/dentist/guest/record-{year}', [GuestController::class, 'show']) -> name('dentist.guest.record');
    Route::get( '/dentist/guest/setting', [GuestController::class, 'setting']) -> name('dentist.guest.setting');
    Route::patch( '/dentist/guest/password', [GuestController::class, 'password']) -> name('dentist.guest.password');
    Route::patch( '/dentist/guest/permission', [GuestController::class, 'permission']) -> name('dentist.guest.permission');

});