<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transmittals/{transmittal}', function (\App\Models\Transmittal $transmittal) {
    // Logic to handle the transmittal view
    // dd($transmittal);
    return view('transmittals.show', ['transmittal' => $transmittal]);
})->name('transmittals.show');
