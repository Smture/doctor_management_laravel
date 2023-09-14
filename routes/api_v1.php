<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('token/{mobile}', 'User\UserApiController@getToken');
});

Route::prefix('appointments')->group(function () {
    Route::get('', 'Appointment\AppointmentApiController@onboardDoctor'); // this will have a date filter
    Route::post('book', 'Appointment\AppointmentApiController@bookAppointment');
    Route::put('update', 'Appointment\AppointmentApiController@update');
});
