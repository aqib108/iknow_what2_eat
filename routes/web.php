<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/storage', function() {
    Artisan::call('storage:link');
    return "Storage link";
    });

Route::get('/clear-cache', function () {
Artisan::call('cache:clear'); //storage:link
// Artisan::call('route:cache');
Artisan::call('route:clear');
Artisan::call('view:clear');
Artisan::call('config:clear');
Artisan::call('config:cache');
// Artisan::call('storage:link');
echo "done";
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
    echo "done";
    });



Route::get('/optimize', function ()
{
	Artisan::call('optimize');
	return 'optimize';
});

