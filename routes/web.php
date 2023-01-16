<?php

use App\Http\Controllers\BudgetController as BudgetsController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BudgetController as BudgetController;


Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

//
//Budget
    Route::get('budget', [BudgetController::class,'index'])->name('budget');
    Route::get('create', [BudgetController::class,'create'])->name('create');
    Route::post('store', [BudgetController::class,'store'])->name('store');
    Route::get('show/{id}', [BudgetController::class,'show'])->name('show');
    Route::get('edit/{id}', [BudgetController::class,'edit'])->name('edit');
    Route::post('update/{budget}', [BudgetController::class,'update'])->name('update');
    Route::delete('destroy/{id}', [BudgetController::class,'destroy'])->name('destroy');


    //category
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('category_create', [CategoryController::class,'create'])->name('category_create');
    Route::post('category_store', [CategoryController::class,'store'])->name('category_store');
    Route::get('category_show/{id}', [CategoryController::class,'show'])->name('category_show');
    Route::get('category_edit/{id}', [CategoryController::class,'edit'])->name('category_edit');
    Route::post('category_update/{budget}', [CategoryController::class,'update'])->name('category_update');
    Route::delete('category_destroy/{id}', [CategoryController::class,'destroy'])->name('category_destroy');


    //expense
    Route::get('expense', [ExpensesController::class,'index'])->name('expense');
    Route::get('expense_create', [ExpensesController::class,'create'])->name('expense_create');
    Route::post('expense_store', [ExpensesController::class,'store'])->name('expense_store');
    Route::get('expense_show/{id}', [ExpensesController::class,'show'])->name('expense_show');
    Route::get('expense_edit/{id}', [ExpensesController::class,'edit'])->name('expense_edit');
    Route::post('expense_update/{budget}', [ExpensesController::class,'update'])->name('expense_update');
    Route::delete('expense_destroy/{id}', [ExpensesController::class,'destroy'])->name('expense_destroy');

    Route::get('expense_status', [ExpensesController::class,'index'])->name('expense.status');
    Route::get('saving_status', [ExpensesController::class,'index'])->name('saving.status');


});

//Route::get('budgets', [BudgetsController::class, 'index']);
