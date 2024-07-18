<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('logout', [HomeController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

    Route::get('admin/add_agent', [AdminController::class, 'add_agent'])->name('add_agent');

    Route::post('admin/create_agent', [AdminController::class, 'create_agent'])->name('create_agent');

    Route::get('admin/all_agents', [AdminController::class, 'all_agents'])->name('all_agents');

    Route::get('admin/delete_agent/{id}', [AdminController::class, 'delete_agent'])->name('delete_agent');

    Route::get('admin/ban_agent/{id}', [AdminController::class, 'ban_agent'])->name('ban_agent');

    Route::get('admin/unban_agent/{id}', [AdminController::class, 'unban_agent'])->name('unban_agent');

    Route::get('admin/profile', [AdminController::class, 'profile'])->name('profile');


    Route::get('admin/add_property', [AdminController::class, 'add_property'])->name('add_property');

    Route::post('admin/store_property', [AdminController::class, 'store_property'])->name('store_property');

    Route::get('admin/property_list', [AdminController::class, 'property_list'])->name('property_list');

    Route::get('admin/delete_property/{id}', [AdminController::class, 'delete_property'])->name('delete_property');

    Route::get('admin/edit_property/{id}', [AdminController::class, 'edit_property'])->name('edit_property');

    Route::post('admin/update_property/{id}', [AdminController::class, 'update_property'])->name('update_property');

    Route::get('admin/property_details/{id}', [AdminController::class, 'view_property'])->name('view_property');




    // faqs
    Route::get('admin/FAQs', [FaqController::class, 'FAQs'])->name('FAQs');

    Route::post('admin/store_faq', [FaqController::class, 'store_faq'])->name('store_faq');

    Route::get('admin/edit_faq/{id}', [FaqController::class, 'edit_faq'])->name('edit_faq');

    Route::post('admin/update_faq/{id}', [FaqController::class, 'update_faq'])->name('update_faq');

    Route::get('admin/delete_faq/{id}', [FaqController::class, 'delete_faq'])->name('delete_faq');



    // testimonials
    Route::get('admin/add_testmonial', [TestimonialController::class, 'add_testimonial'])->name('add_testimonial');

    Route::post('create_testimonial', [TestimonialController::class, 'create_testimonial'])->name('create_testimonial');

    Route::get('admin/testimonials', [TestimonialController::class, 'testimonials'])->name('testimonials');

    Route::get('admin/delete_testimonial/{id}', [TestimonialController::class, 'delete_testimonial'])->name('delete_testimonial');

    Route::get('admin/edit_testimonial/{id}', [TestimonialController::class, 'edit_testimonial'])->name('edit_testimonial');

    Route::post('admin/update_testimonial/{id}', [TestimonialController::class, 'update_testimonial'])->name('update_testimonial');



    // contact information
    Route::get('contact_information', [ContactInformationController::class, 'contact_information'])->name('contact_information');

    Route::post('store_contact_information', [ContactInformationController::class, 'store_contact_information'])->name('store_contact_information');

});



Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'agent_dashboard'])->name('agent_dashboard');
});
