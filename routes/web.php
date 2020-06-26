<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route Category
Route::get("/category", "CategoryController@index")->name("categories.index");
Route::get("/category/create", "CategoryController@createCategory")->name("categories.create");
Route::post("/category/save", "CategoryController@saveCategory")->name("categories.save");
Route::get("/category/edit/{category:id}", "CategoryController@editCategory")->name("categories.edit");
Route::put("/category/update/{category:id}", "CategoryController@updateCategory")->name("categories.update");
Route::delete("/category/delete/{category:id}", "CategoryController@deleteCategory")->name("categories.delete");

// Route Role
Route::get('/role', 'RoleController@index')->name("roles.index");
Route::get('/role/create', 'RoleController@createRole')->name("roles.create");
Route::post('/role/save', 'RoleController@saveRole')->name("roles.save");
Route::get('/role/edit/{id:role}', 'RoleController@editRole')->name("roles.edit");