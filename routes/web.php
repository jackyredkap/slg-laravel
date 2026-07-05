<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/orders/{id}', 'OrderController@store')->name('orders.store');

Route::get('/sales-report', 'ReportController@sales')
    ->name('reports.sales');