<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'LandingController@index')->name('welcome');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('pdf/{method}/{method1}','PdfController@openfile')->name('pdf');
    Route::get('pdf/{id}','PdfController@contract')->name('pdfeditor');

    Route::resource('files', 'FileController');

    Route::resource('contracts', 'ContractController');
    Route::resource('hadnwrittens', 'HandwrittenController');
    Route::post('contracts/store', 'ContractController@store')->name("contracts.store");
    Route::post('contracts', 'ContractController@confirm')->name('contracts.confirm');

    Route::get('signatures/{id}', 'SignatureController@presign')->name('signatures.presign');
    Route::post('signatures/sign', 'SignatureController@sign')->name("signatures.sign");
    Route::post('signature', 'SignatureController@generatePDF')->name('signature.generate');

    // LandingPage
    Route::resource('sliders', 'SliderController');
    Route::resource('contact', 'ContactController');
    Route::resource('about', 'AboutController');
    Route::resource('document', 'DocumentController');
    Route::resource('faqs', 'FaqsController');
    // ->middleware('permission:admin.landing');
});
