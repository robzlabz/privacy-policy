<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy/{name}', function (Request $request, $name) {
    $name = ucwords(str_replace('-', ' ', $name));
    $developer = 'Syam Developer';
    $email = 'xenphy@gmail.com';
    return view('privacy-policy', compact('name', 'developer', 'email'));
});
