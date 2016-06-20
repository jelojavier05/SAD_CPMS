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

Route::get('/guard/registration/personalData', 'GuardRegistrationController@personalDataBC')->name('personalDataBC');

Route::get('/guard/registration/educationalBackground', 'GuardRegistrationController@educationalBackgroundBC')->name('educationalBackgroundBC');

Route::get('/guard/registration/sgBackground', 'GuardRegistrationController@sgBackgroundBC')->name('sgBackground');

Route::get('/guard/registration/requirement', 'GuardRegistrationController@requirementBC')->name('requirement');

Route::get('/guard/registration/sgLicense', 'GuardRegistrationController@licenseBC')->name('sgLicense');

Route::get('/guard/registration/account', 'GuardRegistrationController@accountBC')->name('account');

Route::post('/guard/registration/personalData/session', 'GuardRegistrationController@personalDataSession');

Route::post('/guard/registration/educationalBackground/session', 'GuardRegistrationController@educationalBackgroundSession');

    


Route::get('/deployment/index', 'DeploymentController@index');

Route::get('/maintenance/gun', 'GunController@index');

Route::post('/maintenance/gun/create', 'GunController@store');

Route::post('/maintenance/gun/update', 'GunController@update');

Route::post('/maintenance/gun/destroy', 'GunController@destroy');

Route::post('/maintenance/gun/flag', 'GunController@flag');

Route::get('/maintenance/NatureOfBusiness', 'NatureOfBusinessController@index');

Route::get('/maintenance/NatureOfBusiness/get', 'NatureOfBusinessController@getNatureOfBusiness');

Route::post('/maintenance/NatureOfBusiness/add', 'NatureOfBusinessController@addNatureOfBusiness');

Route::post('/maintenance/NatureOfBusiness/update', 'NatureOfBusinessController@updateNatureOfBusiness');

Route::post('/maintenance/NatureOfBusiness/delete', 'NatureOfBusinessController@deleteNatureOfBusiness');

Route::post('/maintenance/NatureOfBusiness/flag', 'NatureOfBusinessController@flagNatureOfBusiness');

Route::get('/maintenance/requirements', 'RequirementsController@index');

Route::get('/maintenance/requirements/get', 'RequirementsController@getRequirement');

Route::post('/maintenance/requirements/add', 'RequirementsController@addRequirements');

Route::post('/maintenance/requirements/update', 'RequirementsController@updateRequirements');

Route::post('/maintenance/requirements/delete', 'RequirementsController@deleteRequirements');

Route::post('/maintenance/requirements/flag', 'RequirementsController@flagRequirements');

Route::get('/maintenance/typeOfGun', 'TypeOfGunController@index');

Route::get('/maintenance/typeOfGun/get', 'TypeOfGunController@getTypeOfGun');

Route::post('/maintenance/typeOfGun/add', 'TypeOfGunController@addTypeOfGun');

Route::post('/maintenance/typeOfGun/update', 'TypeOfGunController@updateTypeOfGun');

Route::post('/maintenance/typeOfGun/flag', 'TypeOfGunController@flagTypeOfGun');

Route::post('/maintenance/typeOfGun/delete', 'TypeOfGunController@deleteTypeOfGun');

Route::get('/maintenance/bodyAttribute', 'BodyAttributeController@index');

Route::get('/maintenance/bodyAttribute/get', 'BodyAttributeController@getBodyAttribute');

Route::post('/maintenance/bodyStatistics/insert', 'BodyAttributeController@addBodyAttribute');

Route::post('/maintenance/bodyStatistics/update', 'BodyAttributeController@updateBodyAttribute');

Route::post('/maintenance/bodyStatistics/delete', 'BodyAttributeController@deleteBodyAttribute');

Route::post('/maintenance/bodyStatistics/flag', 'BodyAttributeController@flagBodyAttribute');

Route::get('/maintenance/leave', 'LeaveController@index');

Route::get('/maintenance/leave/get', 'LeaveController@getLeave');

Route::post('/maintenance/leave/update', 'LeaveController@updateLeave');

Route::post('/maintenance/leave/flag', 'LeaveController@flagLeave');

Route::post('/maintenance/leave/insert', 'LeaveController@addLeave');

Route::post('/maintenance/leave/delete', 'LeaveController@deleteLeave');

Route::get('/maintenance/governmentExam', 'GovernmentExamController@index');

Route::get('/maintenance/governmentExam/get', 'GovernmentExamController@getGovernmentExam');

Route::post('/maintenance/governmentExam/update', 'GovernmentExamController@updateGovernmentExam');

Route::post('/maintenance/governmentExam/insert', 'GovernmentExamController@addGovernmentExam');

Route::post('/maintenance/governmentExam/flag', 'GovernmentExamController@flagGovernmentExam');

Route::post('/maintenance/governmentExam/delete', 'GovernmentExamController@deleteGovernmentExam');

Route::get('/maintenance/armedservice', 'ArmedServiceController@index');

Route::get('/maintenance/armedservice/get', 'ArmedServiceController@getArmedService');

Route::post('/maintenance/armedservice/update', 'ArmedServiceController@updateArmedService');

Route::post('/maintenance/armedservice/insert', 'ArmedServiceController@addArmedService');

Route::post('/maintenance/armedservice/delete', 'ArmedServiceController@deleteArmedService');

Route::post('/maintenance/armedservice/flag', 'ArmedServiceController@flagArmedService');

Route::get('/maintenance/typeOfContract', 'TypeOfContractController@index');

Route::get('/maintenance/typeOfContract/get', 'TypeOfContractController@getTypeOfContract');

Route::post('/maintenance/typeOfContract/insert', 'TypeOfContractController@addTypeOfContract');

Route::post('/maintenance/typeOfContract/update', 'TypeOfContractController@updateTypeOfContract');

Route::post('/maintenance/typeOfContract/delete', 'TypeOfContractController@deleteTypeOfContract');

Route::post('/maintenance/typeOfContract/flag', 'TypeOfContractController@flagTypeOfContract');

Route::get('/', function () {
    return view('welcome');
});
