<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TestimonialController;
use App\Models\State;
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
    $states = State::all();
    return view('welcome', ['states' => $states]);
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/properties', function () {
    return view('properties');
})->name('properties');



Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/properties/search', [PropertyController::class, 'search'])->name('property.search');


Route::post('make_contact', [ContactFormController::class, 'make_contact'])->name('make_contact');


Route::get('propert_details/{id}', [FrontendController::class, 'property_details'])->name('property_details');

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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


    // inquiry route
    Route::get('admin/enquiry', [EnquiryController::class, 'enquiry'])->name('inquiry');

    Route::get('admin/delete_message/{id}', [EnquiryController::class, 'delete_message'])->name('delete_message');





    // contact information
    Route::get('contact_information', [ContactInformationController::class, 'contact_information'])->name('contact_information');

    Route::post('store_contact_information', [ContactInformationController::class, 'store_contact_information'])->name('store_contact_information');




    // profile and password
    Route::get('admin/profile_setting', [AdminController::class, 'profile_setting'])->name('profile_setting');


    Route::post('admin/profile_update', [AdminController::class, 'profile_update'])->name('profile_update');


    Route::post('admin/password_update', [AdminController::class, 'password_update'])->name('password_update');
});



Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'agent_dashboard'])->name('agent_dashboard');


    // profile and password
    Route::get('agent/profile_setting', [AgentController::class, 'profile_setting'])->name('agent_profile_setting');


    Route::post('agent/profile_update', [AgentController::class, 'profile_update'])->name('agent_profile_update');


    Route::post('agent/password_update', [AgentController::class, 'password_update'])->name('agent_password_update');



    Route::get('agent/add_property', [AgentController::class, 'add_property'])->name('agent_add_property');

    Route::post('agent/store_property', [AgentController::class, 'store_property'])->name('agent_store_property');

    Route::get('agent/property_list', [AgentController::class, 'property_list'])->name('agent_property_list');

    Route::get('agent/delete_property/{id}', [AgentController::class, 'delete_property'])->name('agent_delete_property');

    Route::get('agent/edit_property/{id}', [AgentController::class, 'edit_property'])->name('agent_edit_property');

    Route::post('agent/update_property/{id}', [AgentController::class, 'update_property'])->name('agent_update_property');

    Route::get('agent/property_details/{id}', [AgentController::class, 'view_property'])->name('agent_view_property');
});
