<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\IllnessController;

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

Route::get('/', function () {
    return view('home');
    //return view('auth.registration');
    //return view('auth.login');
})->name('/');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::get('registration-client', [CustomAuthController::class, 'registration_client'])->name('register-client');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::post('registration-client', [CustomAuthController::class, 'custom_registration_client'])->name('register-client.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login')->middleware('guest');

Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');




Route::get('visit', [VisitController::class, 'index'])->name('visit');

Route::get('visit_company', [VisitController::class, 'index_company'])->name('visit_company');

Route::post('visit/add', [VisitController::class, 'add_visit'])->name('visits.add_visit');

Route::get('visit/add', [VisitController::class, 'add'])->name('visit_add');

Route::get('visit/edit/{id}', [VisitController::class, 'visit_edit'])->name('visit_edit');

Route::get('visit/mark/{id}', [\App\Http\Controllers\DiseaseController::class, 'mark_visit'])->name('mark_visit');

Route::post('visit/mark', [DiseaseController::class, 'visit_mark'])->name('visit_mark');

Route::post('visit/edit', [VisitController::class, 'visit_update'])->name('visit_update');

Route::get('visit/fetchall', [VisitController::class, 'fetch_all'])->name('visit.fetchall');

Route::get('visit/fetchall_company', [VisitController::class, 'fetch_all_company'])->name('visit.fetchall_company');

Route::get('visit/delete/{id}', [VisitController::class, 'delete'])->name('delete');


Route::get('illnesses', [IllnessController::class, 'index'])->name('illnesses');

Route::get('illnesses/fetchall', [IllnessController::class, 'fetch_all'])->name('illnesses.fetchall');

Route::get('illnesses/add', [IllnessController::class, 'add'])->name('illnesses_add');

Route::post('illnesses/add', [IllnessController::class, 'add_illness'])->name('illnesses.add_illness');
