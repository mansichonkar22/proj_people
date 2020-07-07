<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('employees', 'ApiController@getAllEmployees');
Route::get('employees/{ip_address}', 'ApiController@getEmployee');
Route::post('employees', 'ApiController@createEmployee');
Route::delete('employees/{ip_address}','ApiController@deleteEmployee');

Route::get('emp_web_history/{ip_address}', 'ApiController@get_emp_web_history');
Route::post('emp_web_history', 'ApiController@create_emp_web_history');
Route::delete('emp_web_history/{ip_address}','ApiController@delete_emp_web_history');