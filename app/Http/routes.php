<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/maintenance/vitalStatistics', 'VitalStatisticsController@index')->name('vitalStatisticsIndex');

Route::post('/maintenance/insertVitalStatistics', 'VitalStatisticsController@addVitalStatistics')->name('vitalStatisticsAdd');

Route::get('/maintenance/unitOfMeasurement', 'UnitOfMeasurementController@index')->name('unitOfMeasurementIndex');

Route::post('/maintenance/insertUnitOfMeasurement', 'UnitOfMeasurementController@addUnitOfMeasurement')->name('unitOfMeasurementAdd');

Route::get('/maintenance/leave', 'LeaveController@index')->name('leaveIndex');

Route::post('/maintenance/updateLeave', 'LeaveController@updateLeave')->name('leaveUpdate');

Route::post('/maintenance/insertLeave', 'LeaveController@addLeave')->name('leaveAdd');

Route::post('/maintenance/deleteLeave', 'LeaveController@deleteLeave')->name('leaveDelete');

Route::get('/maintenance/governmentExam', 'GovernmentExamController@index')->name('governmentExamIndex');

Route::post('/maintenance/updategovernmentExam', 'GovernmentExamController@updateGovernmentExam')->name('governmentExamUpdate');

Route::post('/maintenance/insertGovernmentExam', 'GovernmentExamController@addGovernmentExam')->name('governmentExamAdd');

Route::get('/maintenance/armedservice', 'ArmedServiceController@index')->name('armedServiceIndex');

Route::post('/maintenance/updateArmedService', 'ArmedServiceController@updateArmedService')->name('armedServiceUpdate');

Route::post('/maintenance/insertArmedService', 'ArmedServiceController@addArmedService')->name('armedServiceAdd');

Route::get('/', function () {
    return view('welcome');
});
