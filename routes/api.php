<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\apisuppliercontroller;
use App\Http\Controllers\api\apicustomercontroller;
use App\Http\Controllers\api\apiloaispcontroller;
use App\Http\Controllers\api\apisanphamcontroller;
use App\Http\Controllers\api\apinewscontroller;
use App\Http\Controllers\api\apiphanhoicontroller;
use App\Http\Controllers\api\billbanapi;
<<<<<<< HEAD
use App\Http\Controllers\api\billbandetailapi;
=======
use App\Http\Controllers\api\apiuserscontroller;
use App\Http\Controllers\api\apislidecontroller;
use App\Http\Controllers\api\apiquangcaocontroller;
>>>>>>> 93f82929768f6939c929a1c9a6c305b94e35eda7
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('products',apisanphamcontroller::class);
Route::resource('suppliers',apisuppliercontroller::class);
Route::resource('customers',apicustomercontroller::class);
Route::resource('loaisp',apiloaispcontroller::class);
Route::resource('news',apinewscontroller::class);
Route::resource('billban', billbanapi::class);
<<<<<<< HEAD
Route::resource('billbandetail', billbandetailapi::class);
=======
Route::resource('phanhoi', apiphanhoicontroller::class);
Route::resource('users', apiuserscontroller::class);
Route::resource('slide', apislidecontroller::class);
Route::resource('quangcao', apiquangcaocontroller::class);
>>>>>>> 93f82929768f6939c929a1c9a6c305b94e35eda7
