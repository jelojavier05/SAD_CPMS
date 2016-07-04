<?php


//Route::get('/login', 'LoginController@index')->name('login');

Route::get('/guard/registration/personalData', 'GuardRegistrationController@personalDataBC')->name('personalDataBC');

Route::get('/guard/registration/educationalBackground', 'GuardRegistrationController@educationalBackgroundBC')->name('educationalBackgroundBC');

Route::get('/guard/registration/sgBackground', 'GuardRegistrationController@sgBackgroundBC')->name('sgBackground');

Route::get('/guard/registration/requirement', 'GuardRegistrationController@requirementBC')->name('requirement');

Route::get('/guard/registration/sgLicense', 'GuardRegistrationController@licenseBC')->name('sgLicense');

Route::get('/guard/registration/account', 'GuardRegistrationController@accountBC')->name('account');

Route::post('/guard/registration/personalData/session', 'GuardRegistrationController@personalDataSession');

Route::post('/guard/registration/educationalBackground/session', 'GuardRegistrationController@educationalBackgroundSession');

Route::post('/guard/registration/sgBackground/session', 'GuardRegistrationController@sgBackgroundSession');

Route::post('/guard/registration/requirement/session', 'GuardRegistrationController@requirementSession');

Route::post('/guard/registration/sgLicense/session', 'GuardRegistrationController@sgLicenseSession');

Route::post('/guard/registration/guard/insert', 'GuardRegistrationController@insertGuard');




//SECURITY GUARD INTERFACE ----------------------------------------------------

    Route::get('/login', 'CPMSLoginController@index');
    Route::get('/homepage', 'HomePageSecurityController@index');
    Route::get('/changeloc', 'ChangeLocSecurityController@index');
    Route::get('/attendance', 'AttendanceSecurityController@index');

//SECURITY GUARD INTERFACE ----------------------------------------------------



Route::get('/guardView', 'GuardViewController@index');
Route::get('/clientView', 'ClientViewController@index');



Route::get('/client/registration/basicInfo', 'ClientFormController@basicInfoBC')->name('basicInfoBC');

Route::get('/client/registration/contractInfo', 'ClientFormController@contractInfoBC')->name('contractInfoBC');

Route::get('/client/registration/guardDeployment', 'ClientFormController@guardDeploymentBC')->name('guardDeploymentBC');

Route::get('/client/registration/gunTagging', 'ClientFormController@gunTaggingBC')->name('gunTaggingBC');



Route::get('/guard/deployment', 'GuardDeploymentController@index');

Route::get('/gun/tagging', 'GunTaggingController@index');






Route::get('/gunDelivery', 'GunDeliveryController@index');

Route::get('/gunRegistration', 'GunRegistrationController@index');

Route::get('/deployment/index', 'DeploymentController@index');



Route::get('/maintenance/dashboardadmin', 'DashboardAdminController@index');

Route::get('/maintenance/gun', 'GunController@index');

Route::post('/maintenance/gun/create', 'GunController@store');

Route::post('/maintenance/gun/update', 'GunController@update');

Route::post('/maintenance/gun/destroy', 'GunController@destroy');

Route::post('/maintenance/gun/flag', 'GunController@flag');

Route::get('/maintenance/province', 'ProvinceController@index');

Route::get('/maintenance/province/get', 'ProvinceController@get');

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


