<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frotend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','App\Http\Controllers\Frontend\PageController@home')->name('home.page');
Route::group( ['prefix' => 'registation'], function(){
	Route::get('/','App\Http\Controllers\Backend\RegistationController@index')->name('registation.index');
	Route::post('/','App\Http\Controllers\Backend\RegistationController@store')->name('registation.store');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
	 Route::group( ['prefix' => 'admin'], function(){

	 	Route::get('/dashbord','App\Http\Controllers\Backend\PageController@admin')->name('admin.dashbord');
	 	Route::get('/edit','App\Http\Controllers\Backend\UserController@adminEdit')->name('admin.user.edit');
	 	Route::post('/updates','App\Http\Controllers\Backend\UserController@adminUpdate')->name('admintProfile.update');
	 	Route::get('/changePassword','App\Http\Controllers\Backend\UserController@adminChangePass')->name('admin.change.password');
	 	Route::post('/changePassword','App\Http\Controllers\Backend\UserController@adminUpdatePass')->name('admin.user.updatePass');
	 	//doctor
		Route::group( ['prefix' => 'doctor'], function(){
			Route::get('/manage','App\Http\Controllers\Backend\DoctorController@index')->name('doctor.manage');
			Route::get('/add','App\Http\Controllers\Backend\DoctorController@create')->name('doctor.add');
			Route::get('/edit/{id}','App\Http\Controllers\Backend\DoctorController@edit')->name('doctor.edit');
			Route::post('/edit/{id}','App\Http\Controllers\Backend\DoctorController@update')->name('doctor.update');
			Route::post('/store','App\Http\Controllers\Backend\DoctorController@store')->name('doctor.store');
			Route::post('destroy/{id}', 'App\Http\Controllers\Backend\DoctorController@destroy')->name('doctor.destroy');
			//appoint doctor manage
			Route::get('/appoint-doctor','App\Http\Controllers\Backend\DoctorController@appointDoctors')->name('appointDoctor.manage');
			Route::post('/appoint-doctor/{id}','App\Http\Controllers\Backend\DoctorController@appointDoctorApprove')->name('appointDoctor.approve');

			//doctor show
			Route::get('/show/{id}','App\Http\Controllers\Backend\DoctorController@show')->name('doctor.show');

			//doctorSpeciality Manage
		 	Route::group( ['prefix' => 'speciality'], function(){
			 	Route::get('/add','App\Http\Controllers\Backend\DoctoctSpeciality@create')->name('speciality.add');
			 	Route::post('/store','App\Http\Controllers\Backend\DoctoctSpeciality@store')->name('speciality.store');
			 	Route::get('/specialities','App\Http\Controllers\Backend\DoctoctSpeciality@index')->name('speciality.manage');
			 	Route::get('/edit/{id}','App\Http\Controllers\Backend\DoctoctSpeciality@edit')->name('speciality.edit');
			 	Route::post('/edit/{id}','App\Http\Controllers\Backend\DoctoctSpeciality@update')->name('speciality.update');
			 	Route::post('destroy/{id}', 'App\Http\Controllers\Backend\DoctoctSpeciality@destroy')->name('speciality.destroy');
	 		});

	 	});
	 	//Patient
		Route::group( ['prefix' => 'patient'], function(){
			Route::get('/manage','App\Http\Controllers\Backend\PatientController@index')->name('patient.manage');
			Route::get('/add','App\Http\Controllers\Backend\PatientController@create')->name('patient.add');
			Route::post('/store','App\Http\Controllers\Backend\PatientController@store')->name('patient.store');

			Route::get('/edit/{id}','App\Http\Controllers\Backend\PatientController@edit')->name('patient.edit');
			Route::post('/edit/{id}','App\Http\Controllers\Backend\PatientController@update')->name('patient.update');
			
			Route::post('destroy/{id}', 'App\Http\Controllers\Backend\PatientController@destroy')->name('patient.destroy');

			//single patient show 
			Route::get('/show/{id}','App\Http\Controllers\Backend\PatientController@show')->name('patient.show');
			Route::get('/prescriptions/{id}','App\Http\Controllers\Backend\PrescriptionController@adminPrescriptions')->name('admin.patient.prescriptions');
			Route::get('/prescription/shows/{id}', 'App\Http\Controllers\Backend\PrescriptionController@patientPrescription')->name('admin.patient.prescription');
		});
		// User Management
		Route::group( ['prefix' => 'user'], function(){
			Route::get('/manage','App\Http\Controllers\Backend\UserController@index')->name('user.manage');
			Route::post('/add/{id}','App\Http\Controllers\Backend\UserController@store')->name('user.add');
		});
		//test report
 		Route::group( ['prefix' => 'test'], function(){
 			Route::get('/all','App\Http\Controllers\Backend\TestController@index')->name('test.manage');
 			Route::post('/updatess/{$id}','App\Http\Controllers\Backend\TestController@testUpdate')->name('test.update');
 		});
	 });

 });
/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
|
| Admin is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
	Route::group( ['prefix' => 'patient'], function(){
	 	Route::get('/dashbord','App\Http\Controllers\Backend\PageController@patient')->name('patient.dashbord');
	 	Route::get('/edit','App\Http\Controllers\Backend\UserController@patientEdit')->name('patient.user.edit');
	 	Route::post('/updates','App\Http\Controllers\Backend\UserController@patientUpdate')->name('patientProfile.update');
	 	Route::get('/changePassword','App\Http\Controllers\Backend\UserController@patientChangePass')->name('patient.change.password');
	 	Route::post('/changePassword','App\Http\Controllers\Backend\UserController@patientUpdatePass')->name('patient.user.updatePass');
	 	Route::get('/doctors','App\Http\Controllers\Backend\DoctorController@doctors')->name('doctor.all');
	 	Route::get('/appoint/doctors','App\Http\Controllers\Backend\DoctorController@appointedDoctors')->name('doctor.appoint.list');
	 	Route::post('appoint/{id}', 'App\Http\Controllers\Backend\DoctorController@appoint')->name('doctor.appoint');
	 	Route::get('/prescriptions/{doctor_id}', 'App\Http\Controllers\Backend\PrescriptionController@patientPrescriptions')->name('patient.prescriptions');
	 	Route::get('/prescription/show/{id}', 'App\Http\Controllers\Backend\PrescriptionController@patientPrescription')->name('patient.prescription');
	 	Route::get('/prescription/{id}', 'App\Http\Controllers\Backend\PrescriptionController@PrescriptionDownload')->name('prescription.download');


	 	// test
	 	Route::get('/tests/{doctor_id}', 'App\Http\Controllers\Backend\TestController@patientTests')->name('patient.tests');

	});
 });
 /*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
| Admin is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
	Route::group( ['prefix' => 'doctor'], function(){
		Route::get('/dashbord','App\Http\Controllers\Backend\PageController@doctor')->name('doctor.dashbord');
		Route::get('/edit','App\Http\Controllers\Backend\UserController@edit')->name('user.edit');
		Route::post('/updates','App\Http\Controllers\Backend\UserController@update')->name('doctorProfile.update');
		Route::get('/changePassword','App\Http\Controllers\Backend\UserController@doctorChangePass')->name('doctor.user.changePass');
		Route::post('/changePassword','App\Http\Controllers\Backend\UserController@doctorUpdatePass')->name('doctor.user.updatePass');
	});
	Route::group( ['prefix' => 'patient'], function(){
		Route::get('/all','App\Http\Controllers\Backend\DoctorController@patients')->name('all.patient');
		Route::get('/prescription/create/{patient_id}','App\Http\Controllers\Backend\PrescriptionController@create')->name('prescription.create');
		Route::get('/prescription/show/all/{patient_id}','App\Http\Controllers\Backend\PrescriptionController@allDoctorPrescriptionShow')->name('prescription.show');
		Route::post('/prescription/{patient_ids}','App\Http\Controllers\Backend\PrescriptionController@store')->name('prescription.store');

		// test
		Route::get('/test/create/{patient_id}','App\Http\Controllers\Backend\TestController@create')->name('test.create');
		Route::post('/test/{patient_ids}','App\Http\Controllers\Backend\TestController@store')->name('test.store');
		Route::get('/test/show/all/{patient_id}','App\Http\Controllers\Backend\TestController@allTestShow')->name('test.show');

		//dashbord sating


	});
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('user/dashboard','App\Http\Livewire\Patient\PatientDashbordComponent@render')->name('patient.dashboard');
});
