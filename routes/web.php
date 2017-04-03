<?php

use App\Mail\Welcome;

Route::get('login', function()
{
    return view('auth.login');
});

Auth::routes();

Route::resource('/quotations', 'QuotationsController');

Route::resource('/clients', 'ClientsController');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('/mail', function () {
    // send an email to "batman@batcave.io"
    Mail::to('benphang1234@gmail.com')->send(new Welcome);

    return view('emails.welcome');
});
Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    return view('welcome');
});