<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->name('index');

Route::get('/result', 'ResultEnquiryController@getIndex')->name('result');

Route::get('/final', function () {
    return view('main.final');
})->name('final');

Route::get('/entry', function () {
    return view('main.entry');
})->name('entry');

Route::get('/studentFee/{id}/{uni_id}', 'AdminController@getStudentFee')->name('viewFee');
ROute::post('/storeFee', 'AdminController@storeStudentFee')->name('storeF');
Route::get('/admin', 'AdminController@getIndex')->name('admin');
Route::get('/viewStudent', 'AdminController@getViewStudent')->name('viewSt');
Route::get('/subject', 'AdminController@getSubject')->name('subject');
Route::post('/addSubject', 'AdminController@storeSubject')->name('storeSu');
Route::get('/addStudent', 'AdminController@getStudent')->name('addSt');
Route::post('/addSt', 'AdminController@storeStudentInfo')->name('storeSt');

Route::get('/student', function () {
    return view('admin.std');
})->name('student');

Auth::routes();

