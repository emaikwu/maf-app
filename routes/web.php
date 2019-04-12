<?php

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

Route::get("/", "ClientsController@index")->name("home");
Route::get("/products", "ClientsController@products")->name("products");
Route::get("/products/{id}", "ClientsController@show")->name("product");
Route::get("/search", "ClientsController@search")->name("search");
Route::get("/contact", "ClientsController@contact")->name("contact");
Route::get("/about", "ClientsController@about")->name("about");
Route::post("/client-feedback", "ClientsController@feedback")->name("feedback");

Route::middleware("auth")->group(function() {
  Route::get('/admin', 'DashboardController@index')->name('dashboard');  
  Route::resource("/admin/products", "ProductsController");
  Route::get("/admin/s", "ProductsController@search")->name("search");
  Route::resource("/admin/users", "UsersController");
  Route::resource("/admin/settings", "SettingsController");
  Route::resource("/admin/categories", "CategoriesController");
  Route::resource("/admin/abouts", "AboutsController");
  Route::resource("/admin/slides", "SlidesController");
});
Auth::routes();
