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

//Pages Routes
Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('terms', 'PagesController@getTerms');
Route::get('privacy', 'PagesController@getPrivacy');

//Resource Routes
Route::resource('inquiries', 'InquiryController');
Route::resource('contributions', 'ContributionController');
Route::resource('acceptinquiries', 'AcceptInquiryController');
Route::resource('acceptcontributions', 'AcceptContributionController');
Route::resource('profile', 'ProfileController');

//Authentication Routes

Auth::routes();

Route::get('home', 'HomeController@getIndex')->name('home');
Route::get('home/inquiries', 'HomeController@getInquiries')->name('home.inquiries');
Route::get('home/contributions', 'HomeController@getContributions')->name('home.contributions');
Route::get('home/account', 'HomeController@getAccount');
Route::get('home/settings', 'HomeController@getSettings');
Route::get('profile', 'HomeController@getProfile');

//Search Routes

Route::get('search', 'SearchController@search')->name('search');
Route::post('search', 'SearchController@search')->name('search');


