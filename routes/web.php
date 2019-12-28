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
Route::post('/final', 'ResultEnquiryController@getDegreeResult')->name('final');

Route::post('/entry', 'AdminController@getDegreeInfo')->name('entry');

Route::get('/studentFee/{id}/{uni_id}', 'AdminController@getStudentFee')->name('viewFee');
Route::post('/storeFee', 'AdminController@storeStudentFee')->name('storeF');
Route::get('/admin', 'AdminController@getIndex')->name('admin');
Route::post('/viewStudent', 'AdminController@getViewStudent')->name('viewSt');
Route::get('/subject', 'AdminController@getSubject')->name('subject');
Route::post('/addSubject', 'AdminController@storeSubject')->name('storeSu');
Route::get('/addStudent', 'AdminController@getStudent')->name('addSt');
Route::post('/addSt', 'AdminController@storeStudentInfo')->name('storeSt');
Route::get('/studentInfo', 'AdminController@getStudentInfo')->name('stdInfo');
Route::get('/degreeEnter/{id}', 'AdminController@getDegreeEnter')->name('stdEnter');
Route::post('/storeDeg', 'AdminController@storeDegreeEnter')->name('storeDeg');


Auth::routes();

