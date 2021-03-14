<?php

use App\Attendancest;
use App\Http\Controllers\AttendancestController;
use App\Http\Controllers\ExportpdfController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RelationsController;
use App\Http\Controllers\StudentController;

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
####relations#####

## ROUTE POUR LES SEANCES ###
Route::get('/seances','SeanceController@create')->name('seances');
Route::post('/seacesadd',"SeanceController@store")->name('seanceadd');
Route::get('/seance/show/{seance_id}',"SeanceController@show")->name('seance.show');
Route::get('/seance/edit/{seance_id}','SeanceController@edit')->name('seance.edit');
Route::post('/seance/update/{seance_id}','SeanceController@update')->name('seance.update');
Route::get('/seances/delete/{seance_id}','SeanceController@destroy')->name('seance.delete');
Route::get('/seancesearch','SeanceController@search')->name('seance.search');
######################ATTENDDANCE#############################
Route::get('/attendancet','AttendancetController@index')->name('attendancet.index');
Route::post('/attendancetadd','AttendancetController@store')->name('attendancet.add');
Route::get('/attendancedelete/{attendance_id}','AttendancetController@destroy')->name('attendancet.delete');
############### RATTRAPGE ###################"
Route::get('/rattrapages','RattrapageController@index')->name('rattrapage.index');
Route::get('/rattrapages/planifier/{attendancet_id}','RattrapageController@planifier')->name('rattrapage.palnifier');
Route::post('/rattrapages/add/{attendancet_id}','RattrapageController@store')->name('rattrapage.store');
Route::get('/rattrapages/delete/{rattrapge_id}','RattrapageController@destroy')->name('rattrapage.delete');
Route::get('/rattrapages/edit/{rattrapge_id}','RattrapageController@edit')->name('rattrapage.edit');
###########Classe############
Route::get('/classes','ClasseController@create')->name('classe.index');
Route::post('/Classes/add','ClasseController@store')->name('classe.add');
Route::get('/classes/show','ClasseController@show')->name('class.show');
Route::get('/classes/delete/{classe_id}','ClasseController@destroy')->name('classe.delete');
###students##############

Route::get('/students','StudentController@create')->name('student.index');
Route::post('/students/add','StudentController@store')->name('student.add');
Route::get('/students/all','StudentController@show')->name('student.show');
Route::get('students/delete/{student_id}','StudentController@destroy')->name('student.delete');
Route::get('students/edit/{student_id}','StudentController@edit')->name('student.edit');
Route::post('students/update/{student_id}','StudentController@update')->name('student.update');
Route::get('/students/search','StudentController@search')->name('student.search');

###attendancestudent############
Route::get('/attendancest',"AttendancestController@index")->name('attendacest.index');
Route::get('/attendancest/search','AttendancestController@create')->name('attendacest.create');
Route::post('/attendancest/search','AttendancestController@store')->name('attendacest.store');
Route::get('/attendancest/details','AttendancestController@show')->name('attendacest.show');

###################export#########
Route::get('/export',[StudentController::class,'exportexcel'])->name('student.exportexcel');
Route::get('/exportpdf',[ExportpdfController::class,'pdf'])->name('exportseancepdf');


##################
Route::get('/users/all','HomeController@hasonerelation');
Route::get('/','HomeController@index');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@gethome')->name('home')->middleware('verified'); /* u can find it in middleware kernel */
/*here we will add a middlware because we need to verify first before go to dashboard */

// Route::get('fillable','HomeController@get'); /*use it to check data */
