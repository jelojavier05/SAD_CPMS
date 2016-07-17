<?php

Route::get('/dashboardadmin', 'DashboardAdminController@index');

Route::get('/admin/pending', 'AdminPendingController@index');

Route::get('/client/registration/contractInfo', 'ClientContractController@index');

// ----------------------------------------GUARD REGISTRATION---------------------------------------------//
Route::get('/guard/registration/personaldata', 'PersonalDataController@index')
    ->name('personaldata');
Route::get('/guard/registration/personaldata/get', 'PersonalDataController@get');
Route::post('/guard/registration/personaldata/post', 'PersonalDataController@post');


Route::get('/guard/registration/educationalbackground', 'EducationalBackgroundController@index')
    ->name('educationalbackground');
Route::get('/guard/registration/educationalbackground/get', 'EducationalBackgroundController@get');
Route::post('/guard/registration/educationalbackground/post', 'EducationalBackgroundController@post');


Route::get('/guard/registration/sgbackground', 'SGBackgroundController@index')
    ->name('sgbackground');
Route::get('/guard/registration/sgbackground/getArmedService', 'SGBackgroundController@getArmedService');
Route::get('/guard/registration/sgbackground/getGovernmentExam', 'SGBackgroundController@getGovernmentExam');
Route::post('/guard/registration/sgbackground/post', 'SGBackgroundController@post');


Route::get('/guard/registration/requirement', 'RequirementController@index')
    ->name('requirement');
Route::get('/guard/registration/requirement/get', 'RequirementController@get');
Route::post('/guard/registration/requirement/post', 'RequirementController@post');


Route::get('/guard/registration/account', 'AccountController@index')
    ->name('account');
Route::get('/guard/registration/account/get', 'AccountController@get');
Route::post('/guard/registration/account/post', 'AccountController@post');


Route::get('/guard/registration/guardSummary', 'GuardRegistrationSummaryController@index')
    ->name('guardSummary');
Route::post('/guard/registration/guardSummary/insert', 'GuardRegistrationSummaryController@insert');


//SECURITY GUARD INTERFACE ----------------------------------------------------

    Route::get('/login', 'CPMSLoginController@index');
    Route::get('/homepage', 'HomePageSecurityController@index');
    Route::get('/changeloc', 'ChangeLocSecurityController@index');
    Route::get('/attendance', 'AttendanceSecurityController@index');

//LATEST SECURITY GUARD INTERFACE ----------------------------------------------------

    Route::get('/securityguard', 'SecurityGuardDashboardController@index');
    Route::get('/securityhomepage', 'SecurityHomepageController@index');
    Route::get('/securityleaverequest', 'SecurityLeaveRequestController@index');
    Route::get('/securitychangelocation', 'SecurityChangeLocationController@index');

//CLIENT INTERFACE ----------------------------------------------------


    Route::get('/client', 'ClientDashboardController@index');
    Route::get('/clienthomepage', 'ClientHomepageController@index');
    Route::get('/clientguardrequest', 'ClientGuardRequestController@index');
    Route::get('/clientgunrequest', 'ClientGunRequestController@index');
    Route::get('/clientguardattendance', 'ClientGuardAttendanceController@index');
    Route::get('/clientsettings', 'ClientSettingsController@index');



Route::get('/admin/home', 'AdminHomeController@index');

Route::get('/guardView', 'GuardViewController@index');
Route::get('/getInformation', 'GuardViewController@getInformationGuard');


Route::get('/clientView', 'ClientViewController@index');



Route::get('/client/registration/basicInfo', 'ClientRegistrationController@index')->name('basicInfoBC');
Route::post('/client/registration/basicInfo/insert', 'ClientRegistrationController@insert');


Route::get('/guard/deployment', 'GuardDeploymentController@index');

Route::get('/gun/tagging', 'GunTaggingController@index');




Route::get('/gunDeliveryView', 'GunDeliveryViewController@index');
Route::get('/gunDeliveryCart', 'GunDeliveryCartController@index');
Route::get('/gunDelivery', 'GunDeliveryController@index');




Route::get('/gunRegistration', 'GunRegistrationController@index');

Route::get('/deployment/index', 'DeploymentController@index');


Route::get('/maintenance/rank', 'RankController@index');
Route::get('/maintenance/rank/get', 'RankController@get');
Route::post('/maintenance/rank/create', 'RankController@create');
Route::post('/maintenance/rank/update', 'RankController@update');
Route::post('/maintenance/rank/delete', 'RankController@delete');
Route::post('/maintenance/rank/flag', 'RankController@flag');


Route::get('/maintenance/unitOfMeasurement', 'UnitOfMeasurementController@index');
Route::get('/maintenance/unitOfMeasurement/get', 'UnitOfMeasurementController@get');
Route::post('/maintenance/unitOfMeasurement/create', 'UnitOfMeasurementController@create');
Route::post('/maintenance/unitOfMeasurement/update', 'UnitOfMeasurementController@update');
Route::post('/maintenance/unitOfMeasurement/delete', 'UnitOfMeasurementController@delete');
Route::post('/maintenance/unitOfMeasurement/flag', 'UnitOfMeasurementController@flag');


Route::get('/maintenance/province', 'ProvinceController@index');
Route::get( '/maintenance/province/get', 'ProvinceController@get');
Route::post('/maintenance/province/create', 'ProvinceController@create');
Route::post('/maintenance/province/update', 'ProvinceController@update');
Route::post('/maintenance/province/delete', 'ProvinceController@delete');
Route::post('/maintenance/province/flag', 'ProvinceController@flag');


Route::get('/maintenance/city', 'CityController@index');
Route::get('/maintenance/city/get', 'CityController@get');
Route::post('/maintenance/city/create', 'CityController@create');
Route::post('/maintenance/city/update', 'CityController@update');
Route::post('/maintenance/city/delete', 'CityController@delete');
Route::post('/maintenance/city/flag', 'CityController@flag');


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


