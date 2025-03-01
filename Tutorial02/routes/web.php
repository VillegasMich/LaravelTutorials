<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', function () {
    $data1 = 'About us - Online Store'; // title
    $data2 = 'About us'; // subtitle
    $description = 'This is the about page';
    $author = 'Developed by: Mauel Villegas';

    return view('home.about')->with('title', $data1)->with('subtitle', $data2)->with('description', $description)->with('author', $author);
})->name('home.about');

Route::get('/contact', function () {
    $data1 = 'Contact us - Online Store'; // title
    $data2 = 'Contact us'; // subtitle
    $description = 'This is the contact page';

    return view('home.contact')->with('title', $data1)->with('subtitle', $data2)->with('description', $description);
})->name('home.contact');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
