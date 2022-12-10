<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\SubscribeController;
use App\Models\Teacher;
use Illuminate\Routing\Route as RoutingRoute;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('dashboard', 'cms.dashboard');
Route::view('temp', 'cms.temp');
// view.login

//Route belongto Auth login-logout only.
//middleware(guset route) login
Route::prefix('cms/')->middleware('guest:admin,teacher')->group(function () { //route ->guset
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('dashboard.login');
    Route::post('{guard}/login', [UserAuthController::class, 'login']);
});
//middleware(auth route)---logout
Route::prefix('cms/admin/')->middleware('auth:admin,teacher')->group(function () { //route ->guset
    Route::get('dashboard.logout', [UserAuthController::class, 'logout'])->name('dashboard.logout');
});


// Route belongto  Admin Only.
Route::prefix('cms/admin')->group(function () { //->middleware('auth:admin,teacher')
    Route::view('', 'cms.dashboard');
    //Admin
    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');
    //City
    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}', [CityController::class, 'update']);
    //Couantry
    Route::resource('countries', CountryController::class);
    Route::post('countries_update/{id}', [CountryController::class, 'update']);
    //Subjects
    Route::resource('subjects', SubjectController::class);
    Route::post('subjects_update/{id}', [SubjectController::class, 'update']);
    //Ccourse
    Route::resource('courses', CourseController::class);
    Route::post('courses_update/{id}', [CourseController::class, 'update']);
    //Teacher
    Route::resource('teachers', TeacherController::class);
    Route::post('teachers_update/{id}', [TeacherController::class, 'update'])->name('teachers_update');
    
    //Student
    Route::resource('students', StudentController::class);
    Route::post('students_update/{id}', [StudentController::class, 'update'])->name('students_update');
    //Contacts
    Route::resource('contacts', ContactController::class);
    Route::post('contacts_update/{id}', [ContactController::class, 'update'])->name('contacts_update');


    //Reviews
    Route::resource('reviews', ReviewController::class);
    Route::post('reviews_update/{id}', [StudentController::class, 'update'])->name('reviews_update');

    //Questions
    Route::resource('questions', QuestionController::class);
    //Sliders
    Route::resource('sliders', SliderController::class);
    Route::post('sliders_update/{id}', [SliderController::class, 'update'])->name('sliders_update');
    //Links
    Route::resource('links', LinkController::class);
    Route::post('links_update/{id}', [LinkController::class, 'update'])->name('links_update');
    //Subscribes
    Route::resource('subscribes', SubscribeController::class);
    //Edit-Profile&&update-profile

    // Route::get('edit/profile', [UserAuthController::class, 'editProfile'])->name('dashboard.editprofile');
    // Route::post('update/profile', [UserAuthController::class, 'updateProfile'])->name('dashboard.updateprofile');
    // Route::get('edit/profileTeacher' , [UserAuthController::class , 'editProfileTeacher'])->name('dashboard.editTeacher');
    Route::get('edit/profile', [SettingController::class, 'editProfile'])->name('dashboard.editprofile');
    Route::post('update/profile', [SettingController::class, 'updateProfile'])->name('dashboard.updateprofile');
    Route::get('edit/profileTeacher' , [SettingController::class , 'editProfileTeacher'])->name('dashboard.editTeacher');

    //Edit-Password&&update-password
    Route::get('edit/password', [SettingController::class, 'editPassword'])->name('dashboard.editpassword');
    Route::post('update/password', [SettingController::class, 'UpdatePassword'])->name('dashboard.updatepassword');






    //Route belong To Roles &permissions

    Route::resource('roles', RoleController::class);
    Route::post('roles_update/{id}', [RoleController::class, 'update'])->name('roles_update');

    Route::resource('permissions', PermissionController::class);
    Route::post('permissions_update/{id}', [PermissionController::class, 'update'])->name('permissions_update');

    Route::resource('roles.permissions', RolePermissionController::class);
});





/* ******* Routes belongsTo WEBSITE ******/
Route::prefix('website/')->group(function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('courses', [HomeController::class, 'courses'])->name('courses');
});
