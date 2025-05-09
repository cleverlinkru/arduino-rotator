<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::inertia('', 'Main', [
    'val1' => (int)Storage::get('val1.txt'),
    'val2' => (int)Storage::get('val2.txt'),
]);

Route::get('pos', function () {
    $val1 = (int)Storage::get('val1.txt');
    $val2 = (int)Storage::get('val2.txt');
    return "$val1;$val2";
});

Route::post('change', function () {
    $val1 = Request::get('val1');
    $val2 = Request::get('val2');
    Storage::put('val1.txt', (string)$val1);
    Storage::put('val2.txt', (string)$val2);
    return Response::redirectTo('');
});
