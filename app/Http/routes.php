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

Route::get('/deployment/index', 'DeploymentController@index');

Route::get('/maintenance/gun', 'GunController@index');

Route::post('/maintenance/gun/create', 'GunController@store');

Route::post('/maintenance/gun/update', 'GunController@update');

Route::post('/maintenance/gun/destroy', 'GunController@destroy');

Route::post('/maintenance/gun/flag', 'GunController@flag');

Route::get('/guardIndex', 'GuardController@index');

Route::get('/guardForm', 'GuardController@guardForm');

Route::get('/maintenance/NatureOfBusiness', 'NatureOfBusinessController@index')->name('natureOfBusinessIndex');

Route::post('/maintenance/addNatureOfBusiness', 'NatureOfBusinessController@addNatureOfBusiness')->name('natureOfBusinessAdd');

Route::post('/maintenance/updateNatureOfBusiness', 'NatureOfBusinessController@updateNatureOfBusiness')->name('natureOfBusinessUpdate');

Route::post('/maintenance/deleteNatureOfBusiness', 'NatureOfBusinessController@deleteNatureOfBusiness')->name('natureOfBusinessDelete');

Route::post('/maintenance/flagNatureOfBusiness', 'NatureOfBusinessController@flagNatureOfBusiness')->name('natureOfBusinessFlag');

Route::get('/maintenance/requirements', 'RequirementsController@index')->name('requirementsIndex');

Route::post('/maintenance/addRequirements', 'RequirementsController@addRequirements')->name('requirementsAdd');

Route::post('/maintenance/updateRequirements', 'RequirementsController@updateRequirements')->name('requirementsUpdate');

Route::post('/maintenance/deleteRequirements', 'RequirementsController@deleteRequirements')->name('requirementsDelete');

Route::get('/maintenance/typeOfGun', 'TypeOfGunController@index')->name('typeOfGunIndex');

Route::get('/maintenance/getTypeOfGun', 'TypeOfGunController@getTypeOfGun')->name('typeOfGunGet');

Route::post('/maintenance/addTypeOfGun', 'TypeOfGunController@addTypeOfGun')->name('typeOfGunAdd');

Route::post('/maintenance/updateTypeOfGun', 'TypeOfGunController@updateTypeOfGun')->name('typeOfGunUpdate');

Route::post('/maintenance/flagTypeOfGun', 'TypeOfGunController@flagTypeOfGun')->name('typeOfGunFlag');

Route::post('/maintenance/deleteTypeOfGun', 'TypeOfGunController@deleteTypeOfGun')->name('typeOfGunDelete');

Route::get('/maintenance/vitalStatistics', 'VitalStatisticsController@index')->name('vitalStatisticsIndex');

Route::post('/maintenance/insertVitalStatistics', 'VitalStatisticsController@addVitalStatistics')->name('vitalStatisticsAdd');

Route::post('/maintenance/updateVitalStatistics', 'VitalStatisticsController@updateVitalStatistics')->name('vitalStatisticsUpdate');

Route::post('/maintenance/deleteVitalStatistics', 'VitalStatisticsController@deleteVitalStatistics')->name('vitalStatisticsDelete');

Route::get('/maintenance/unitOfMeasurement', 'UnitOfMeasurementController@index')->name('unitOfMeasurementIndex');

Route::post('/maintenance/insertUnitOfMeasurement', 'UnitOfMeasurementController@addUnitOfMeasurement')->name('unitOfMeasurementAdd');

Route::post('/maintenance/updateUnitOfMeasurement', 'UnitOfMeasurementController@updateUnitOfMeasurement')->name('unitOfMeasurementUpdate');

Route::post('/maintenance/flagUnitOfMeasurement', 'UnitOfMeasurementController@flagUnitOfMeasurement')->name('unitOfMeasurementFlag');

Route::post('/maintenance/deleteUnitOfMeasurement', 'UnitOfMeasurementController@deleteUnitOfMeasurement')->name('unitOfMeasurementDelete');

Route::get('/maintenance/leave', 'LeaveController@index')->name('leaveIndex');

Route::post('/maintenance/updateLeave', 'LeaveController@updateLeave')->name('leaveUpdate');

Route::post('/maintenance/flagLeave', 'LeaveController@flagLeave')->name('leaveFlag');

Route::post('/maintenance/insertLeave', 'LeaveController@addLeave')->name('leaveAdd');

Route::post('/maintenance/deleteLeave', 'LeaveController@deleteLeave')->name('leaveDelete');

Route::get('/maintenance/governmentExam', 'GovernmentExamController@index')->name('governmentExamIndex');

Route::get('/maintenance/getGovernmentExam', 'GovernmentExamController@getGovernmentExam')->name('governmentExamGet');

Route::post('/maintenance/updategovernmentExam', 'GovernmentExamController@updateGovernmentExam')->name('governmentExamUpdate');

Route::post('/maintenance/insertGovernmentExam', 'GovernmentExamController@addGovernmentExam')->name('governmentExamAdd');

Route::post('/maintenance/flagGovernmentExam', 'GovernmentExamController@flagGovernmentExam')->name('governmentExamFlag');

Route::post('/maintenance/deletegovernmentExam', 'GovernmentExamController@deleteGovernmentExam')->name('governmentExamDelete');

Route::get('/maintenance/armedservice', 'ArmedServiceController@index')->name('armedServiceIndex');

Route::post('/maintenance/updateArmedService', 'ArmedServiceController@updateArmedService')->name('armedServiceUpdate');

Route::post('/maintenance/insertArmedService', 'ArmedServiceController@addArmedService')->name('armedServiceAdd');

Route::post('/maintenance/deleteArmedService', 'ArmedServiceController@deleteArmedService')->name('armedServiceDelete');

Route::post('/maintenance/flagArmedService', 'ArmedServiceController@flagArmedService')->name('armedServiceFlag');

Route::get('/', function () {
    return view('welcome');
});
