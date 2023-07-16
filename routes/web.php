<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\LocationCategoryController;
use App\Http\Controllers\OccupationCategoryController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\SpecialityCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\savedJobController;
use Illuminate\Support\Facades\Route;

//public routes
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/job/{job}', [PostController::class, 'show'])->name('post.show');
Route::get('employer/{employer}', [AuthorController::class, 'employer'])->name('account.employer');

//return vue page
Route::get('/search', [JobController::class, 'index'])->name('job.index');

//auth routes
Route::middleware('auth')->prefix('account')->group(function () {
  //every auth routes AccountController
  Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
  Route::get('overview', [AccountController::class, 'index'])->name('account.index');
  Route::get('deactivate', [AccountController::class, 'deactivateView'])->name('account.deactivate');
  Route::get('change-password', [AccountController::class, 'changePasswordView'])->name('account.changePassword');
  Route::delete('delete', [AccountController::class, 'deleteAccount'])->name('account.delete');
  Route::put('change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
  //savedJobs
  Route::get('my-saved-jobs', [savedJobController::class, 'index'])->name('savedJob.index');
  Route::get('my-saved-jobs/{id}', [savedJobController::class, 'store'])->name('savedJob.store');
  Route::delete('my-saved-jobs/{id}', [savedJobController::class, 'destroy'])->name('savedJob.destroy');
  //applyjobs
  Route::get('apply-job', [AccountController::class, 'applyJobView'])->name('account.applyJob');
  Route::post('apply-job', [AccountController::class, 'applyJob'])->name('account.applyJob');

  //Admin Role Routes
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
    Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
    Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');

    Route::get('locategory/{locategory}/edit', [LocationCategoryController::class, 'edit'])->name('locategory.edit');
    Route::post('locategory', [LocationCategoryController::class, 'store'])->name('locategory.store');
    Route::put('locategory/{id}', [LocationCategoryController::class, 'update'])->name('locategory.update');
    Route::match(['get','put','delete'], 'locategory/{id}', [LocationCategoryController::class, 'destroy'])->name('locategory.destroy');

    Route::get('occategory/{occategory}/edit', [OccupationCategoryController::class, 'edit'])->name('occategory.edit');
    Route::post('occategory', [OccupationCategoryController::class, 'store'])->name('occategory.store');
    Route::put('occategory/{id}', [OccupationCategoryController::class, 'update'])->name('occategory.update');
    Route::match(['get','put','delete'],'occategory/{id}', [OccupationCategoryController::class, 'destroy'])->name('occategory.destroy');

    Route::get('bucategory/{bucategory}/edit', [BusinessCategoryController::class, 'edit'])->name('bucategory.edit');
    Route::post('bucategory', [BusinessCategoryController::class, 'store'])->name('bucategory.store');
    Route::put('bucategory/{id}', [BusinessCategoryController::class, 'update'])->name('bucategory.update');
    Route::match(['get','put','delete'],'bucategory/{id}', [BusinessCategoryController::class, 'destroy'])->name('bucategory.destroy');

    Route::get('spcategory/{spcategory}/edit', [SpecialityCategoryController::class, 'edit'])->name('spcategory.edit');
    Route::post('spcategory', [SpecialityCategoryController::class, 'store'])->name('spcategory.store');
    Route::put('spcategory/{id}', [SpecialityCategoryController::class, 'update'])->name('spcategory.update');
    Route::match(['get','put','delete'],'spcategory/{id}', [SpecialityCategoryController::class, 'destroy'])->name('spcategory.destroy');
  });

  //Author Role Routes
  Route::group(['middleware' => ['role:author']], function () {
    Route::get('author-section', [AuthorController::class, 'authorSection'])->name('account.authorSection');

    Route::get('job-application/{id}', [JobApplicationController::class, 'show'])->name('jobApplication.show');
    Route::delete('job-application', [JobApplicationController::class, 'destroy'])->name('jobApplication.destroy');
    Route::get('job-application', [JobApplicationController::class, 'index'])->name('jobApplication.index');

    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::post('company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::delete('company', [CompanyController::class, 'destroy'])->name('company.destroy');
  });

  //User Role routes
  Route::group(['middleware' => ['role:user']], function () {
    Route::get('become-employer', [AccountController::class, 'becomeEmployerView'])->name('account.becomeEmployer');
    Route::post('become-employer', [AccountController::class, 'becomeEmployer'])->name('account.becomeEmployer');
  });
});
