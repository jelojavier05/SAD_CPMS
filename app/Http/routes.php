<?php

Route::get('/test', 'TestController@index');

Route::get('/contractextensions', 'ContractExtensionsController@index');

Route::get('/reportsincidentreports', 'ReportsIncidentReportsController@index');

Route::get('/incidentreportsadmin', 'IncidentReportsAdminController@index');
Route::get('/incidentreportsadmin/get/IncidentReportInformation', 'IncidentReportsAdminController@getIncidentReportInformation');

Route::get('/incidentreportsclient', 'IncidentReportsClientController@index');

Route::get('/sgtransferlog', 'SgTransferHistoryController@index');
Route::get('/sgtransferlog/get/guardInformation', 'SgTransferHistoryController@getGuardInformation');

Route::get('/insertmaintenance', 'MaintenanceController@insert');

Route::get('/clientaddgunproceed', 'ClientAddGunProceedController@index');
Route::get('/clientaddgunproceed/setInboxSession', 'ClientAddGunProceedController@setInboxSession');
Route::get('/clientaddgunproceed/getRequestIdentifier', 'ClientAddGunProceedController@getRequestIdentifier');
Route::post('/clientaddgunproceed/post/insertgunorder', 'ClientAddGunProceedController@insertGunOrder');

Route::get('/queryguard', 'QueryGuardController@index');
Route::get('/queryclient', 'QueryClientController@index');
Route::get('/querygun', 'QueryGunController@index');


Route::get('/querynatureofbusiness', 'QueryNatureOfBusinessController@index');
Route::get('/querynatureofbusiness/get/natureofbusiness', 'QueryNatureOfBusinessController@getNatureOfBusiness');


Route::get('/querytypeofcontract', 'QueryTypeOfContractController@index');
Route::get('/queryarmedservice', 'QueryArmedServiceController@index');


Route::get('/queryrank', 'QueryRankController@index');
Route::get('/queryrank/get/rank', 'QueryRankController@getRank');


Route::get('/querybodyattributes', 'QueryBodyAttributesController@index');
Route::get('/querygovexam', 'QueryGovernmentExamController@index');
Route::get('/queryleave', 'QueryLeaveController@index');
Route::get('/queryprovince', 'QueryProvinceController@index');
Route::get('/querycity', 'QueryCityController@index');
Route::get('/queryrequirements', 'QueryRequirementsController@index');
Route::get('/queryguntype', 'QueryTypeOfGunController@index');
Route::get('/queryuom', 'QueryUnitOfMeasurementController@index');



Route::get('/removeguardrequest/get/requestInformation', 'RemoveGuardController@getRequestInformation');
Route::post('/removeguardrequest/post/accept', 'RemoveGuardController@accept');
Route::post('/removeguardrequest/post/decline', 'RemoveGuardController@decline');

Route::get('/changeguardrequest/get/ChangeGuardRequest', 'ChangeGuardController@getChangeGuardRequest');
Route::get('/changeguardrequest/get/GuardWaiting', 'ChangeGuardController@getGuardWaiting');
Route::get('/changeguardrequest/get/ClientRequested', 'ChangeGuardController@getClientRequested');
Route::post('/changeguardrequest/post/sendGuardNotification', 'ChangeGuardController@sendGuardNotification');
Route::post('/changeguardrequest/post/accept', 'ChangeGuardController@accept');
Route::post('/changeguardrequest/post/decline', 'ChangeGuardController@decline');
Route::post('/changeguardrequest/post/declinerequest', 'ChangeGuardController@declineRequest');

Route::get('/swaprequest/get/checkStatusSwapRequest', 'SwapRequestGuardController@checkStatusSwapRequest');
Route::get('/swaprequest/get/GuardInvolve', 'SwapRequestGuardController@getGuardInvolve');
Route::post('/swaprequest/post/acceptSwapRequest', 'SwapRequestGuardController@acceptSwapRequest');

Route::get('/addguardrequestcomplete', 'AddRequestCompleteController@index');
Route::post('/addguardrequestcomplete/post/proceedToFinalization', 'AddRequestCompleteController@proceedToFinalization');

Route::get('/swapguardrequestcomplete', 'SwapRequestCompleteController@index');

Route::get('/inbox/get', 'InboxController@getInbox');
Route::post('/inbox/post/readinbox', 'InboxController@readInbox');
Route::get('/inbox/get/numberofunreadmessages', 'InboxController@getNumberOfUnreadMessages');


//ADMIN REPORTS//
Route::get('/adminreports', 'AdminReportsController@index');

Route::get('/adminInbox', 'AdminInboxController@index');
Route::get('/adminInbox/get/guardwaiting', 'AdminInboxController@getGuardWaiting');
Route::get('/adminInbox/get/numberguard', 'AdminInboxController@getNewClientNumberOfGuard');
Route::post('/adminInbox/send/newclientnotification', 'AdminInboxController@sendGuardPendingNotification');
Route::get('/adminInbox/get/guardhasnotification', 'AdminInboxController@getGuardHasNotification');
Route::get('/adminInbox/get/message', 'AdminInboxController@getMessage');
Route::get('/adminInbox/get/clientpendingnotificationstatus', 'AdminInboxController@getClientPendingNotificationStatus');
Route::get('/adminInbox/get/guardrequestleaveinformation', 'AdminInboxController@getGuardRequestLeaveInformation');
Route::get('/adminInbox/get/getGuardHasNotificationLeaveRequest', 'AdminInboxController@getGuardHasNotificationLeaveRequest');
Route::get('/adminInbox/get/getRequestInformation', 'AdminInboxController@getRequestInformation');
Route::get('/adminInbox/get/AdditionalGuardInformation', 'AdminInboxController@getAdditionalGuardInformation');

Route::post('/adminInbox/send/leaverequestnotification', 'AdminInboxController@sendLeaveRequestNotification');
Route::post('/adminInbox/send/AdditionalGuardNotification', 'AdminInboxController@sendAdditionalGuardNotification');
Route::post('/adminInbox/send/setAdditionalGuardID', 'AdminInboxController@setAdditionalGuardID');


Route::get('/crm/home', 'CRMHomeController@index');

Route::get('/gunView', 'GunViewController@index');
Route::get('/gunView/get/guns', 'GunViewController@getGuns');
Route::get('/gunView/get/gun', 'GunViewController@getGun');
Route::post('/gunView/post/update', 'GunViewController@update');

Route::get('/gunLicenses', 'GunLicensesController@index');
Route::get('/gunLicenses/get/guntobeexpired', 'GunLicensesController@getGunToBeExpired');
Route::post('/gunLicenses/post/updateGunLicense', 'GunLicensesController@updateGunLicense');

Route::get('/guardLicenses', 'GuardLicensesController@index');
Route::get('/guardLicenses/get/GuardToBeExpired', 'GuardLicensesController@getGuardToBeExpired');
Route::post('/guardLicenses/post/updateGuardLicense', 'GuardLicensesController@updateGuardLicense');

Route::get('/dashboardadmin', 'DashboardAdminController@index');
Route::get('/dashboardadmin/get/pieguard', 'DashboardAdminController@getPieGuard');
Route::get('/dashboardadmin/get/pieGun', 'DashboardAdminController@getPieGun');
Route::get('/dashboardadmin/get/pieSample', 'DashboardAdminController@getSample');

Route::get('/client/gunTagging', 'GunTaggingController@index');
Route::post('/client/gunTagging/post', 'GunTaggingController@post');

Route::get('/unpaidclients', 'UnpaidClientsController@index');
Route::get('/unpaidclients/get/UnpaidBill', 'UnpaidClientsController@getUnpaidBill');
Route::post('/unpaidclients/post/payBill', 'UnpaidClientsController@payBill');

Route::get('/admin/pending', 'AdminPendingController@index');

Route::get('/client/registration/contractInfo', 'ClientContractController@index');
Route::get('/client/registration/get/guardAccepted', 'ClientContractController@getGuardAccepted');
Route::get('/client/registration/get/gunTagged', 'ClientContractController@getGunTagged');
Route::get('/client/registration/get/client', 'ClientContractController@getClientDetail');
Route::post('/client/registration/post/clientcontract', 'ClientContractController@postContract');

Route::get('/client/tempaccount', 'TempClientAccountController@index');
Route::get('/client/tempaccount/get/guards', 'TempClientAccountController@getGuards');
Route::get('/client/tempaccount/get/client', 'TempClientAccountController@getClient');
Route::get('/client/tempaccountdetails', 'TempClientDetailsController@index');
Route::post('/client/tempaccountdetails/update', 'TempClientDetailsController@update');

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


//USER LOGIN//

Route::get('/userlogin', 'CPMSUserLoginController@index');
Route::get('/userlogin/getaccount', 'CPMSUserLoginController@getAccount');
Route::get('/userlogin/checkmacaddress', 'CPMSUserLoginController@checkMacAddress');
Route::get('/userlogin/logout', 'CPMSUserLoginController@logoutAccount');



//CGR(CLIENT-GUARD RELATIONSHIP) ----------------------------------------------------


Route::get('/cgrmain', 'CGRMainController@index');
Route::get('/cgrguardattendance', 'CGRGuardAttendanceController@index');
Route::get('/cgrguardattendance/get/activeguard', 'CGRGuardAttendanceController@getActiveGuard');
Route::get('/cgrguardattendance/get/attendanceLog', 'CGRGuardAttendanceController@attendanceLog');
Route::post('/cgrguardattendance/post/login', 'CGRGuardAttendanceController@login');
Route::post('/cgrguardattendance/post/timein', 'CGRGuardAttendanceController@timeIn');
Route::post('/cgrguardattendance/post/timeout', 'CGRGuardAttendanceController@timeOut');

Route::get('/cgrreceivingdelivery', 'CGRReceivingDeliveryController@index');
Route::get('/cgrreceivingdelivery/get/delivery', 'CGRReceivingDeliveryController@getDelivery');
Route::get('/cgrreceivingdelivery/get/deliverycode', 'CGRReceivingDeliveryController@getDeliveryCode');
Route::get('/cgrreceivingdelivery/get/deliverydetail', 'CGRReceivingDeliveryController@getDeliveryDetail');
Route::get('/cgrreceivingdelivery/get/removeGunDeliveryInformation', 'CGRReceivingDeliveryController@getRemoveGunDeliveryInformation');
Route::post('/cgrreceivingdelivery/post/setGuardReceiver', 'CGRReceivingDeliveryController@setGuardReceiver');
Route::post('/cgrreceivingdelivery/post/item', 'CGRReceivingDeliveryController@postItem');
Route::get('/cgrreceivingdelivery/get/swapRequestGunInformation', 'CGRReceivingDeliveryController@swapRequestGunInformation');
Route::post('/cgrreceivingdelivery/post/swapRequest', 'CGRReceivingDeliveryController@postSwapRequest');
Route::post('/cgrreceivingdelivery/post/removeGunDelivery', 'CGRReceivingDeliveryController@postRemoveGunDelivery');

Route::get('/cgrreports', 'CGRReportsController@index');
Route::post('/cgrreports/post/report', 'CGRReportsController@postReport');

//SECURITY GUARD INTERFACE ----------------------------------------------------

Route::get('/securityHome', 'SecurityHomeController@index');

Route::get('/securityguard/getClientInformation', 'SecurityGuardDashboardController@getClientInformation');
Route::get('/securityguard/isLicenseUpdated', 'SecurityGuardDashboardController@isLicenseUpdated');

Route::get('/securityInbox', 'SecurityHomepageController@index');
Route::get('/securityInbox/get/guard', 'SecurityHomepageController@getGuardInformation');
Route::get('/securityInbox/get/inbox', 'SecurityHomepageController@getInbox');
Route::get('/securityInbox/get/message', 'SecurityHomepageController@getInboxMessage');
Route::post('/securityInbox/post/readmessage', 'SecurityHomepageController@readNewInbox');
Route::get('/securityInbox/get/clientinformation', 'SecurityHomepageController@getClientInformation');
Route::get('/securityInbox/get/getLeaveRequestInformation', 'SecurityHomepageController@getLeaveRequestInformation');
Route::get('/securityInbox/get/SwapRequest', 'SecurityHomepageController@getSwapRequest');
Route::post('/securityInbox/get/guard', 'SecurityHomepageController@readNewClient');
Route::post('/securityInbox/accept/guard', 'SecurityHomepageController@acceptNewClient');
Route::post('/securityInbox/decline/guard', 'SecurityHomepageController@declineNewClient');
Route::post('/securityInbox/accept/guardleaverequest', 'SecurityHomepageController@acceptLeaveRequest');
Route::post('/securityInbox/decline/guardleaverequest', 'SecurityHomepageController@declineLeaveRequest');
Route::post('/securityInbox/accept/SwapRequest', 'SecurityHomepageController@acceptSwapRequest');

Route::get('/securityleaverequest', 'SecurityLeaveRequestController@index');
Route::post('/securityleaverequest/post/leaverequest', 'SecurityLeaveRequestController@postLeaveRequest');
Route::get('/securityleaverequest/get/guardStatus', 'SecurityLeaveRequestController@guardStatus');
Route::get('/securitychangelocation', 'SecurityChangeLocationController@index');
Route::get('/securitychangelocation/get/clientactiveguards', 'SecurityChangeLocationController@getClientActiveGuards');
Route::get('/securitychangelocation/get/hasPendingRequest', 'SecurityChangeLocationController@hasPendingRequest');
Route::post('/securitychangelocation/post/sendRequest', 'SecurityChangeLocationController@sendRequest');

Route::get('/securitysettings', 'SecuritySettingsController@index');
Route::get('/securitysettings/get', 'SecuritySettingsController@getGuardInformation');
Route::post('/securitysettings/checkpassword', 'SecuritySettingsController@checkPassword');
Route::post('/securitysettings/updateDetail', 'SecuritySettingsController@updateDetail');
Route::post('/securitysettings/updatepassword', 'SecuritySettingsController@updatePassword');

//CLIENT INTERFACE ----------------------------------------------------

    Route::get('/client', 'ClientDashboardController@index');
    Route::get('/client/getinformation', 'ClientDashboardController@getClientInformation');
    Route::get('/clienthomepage', 'ClientHomepageController@index');
    Route::get('/clienthomepage/get/presentGuard', 'ClientHomepageController@getPresentGuard');
    Route::get('/clienthomepage/get/attendanceLog', 'ClientHomepageController@getAttendanceLog');
    Route::get('/clientguardrequest', 'ClientGuardRequestController@index');
    Route::get('/clientguardrequest/get/activeguard', 'ClientGuardRequestController@getActiveGuard');
    Route::get('/clientguardrequest/get/hasAddRequest', 'ClientGuardRequestController@hasAddRequest');
    Route::get('/clientguardrequest/get/hasGuardRequest', 'ClientGuardRequestController@hasGuardRequest');
    Route::get('/clientguardrequest/get/code', 'ClientGuardRequestController@getCode');
    Route::get('/clientguardrequest/get/ClientShiftCount', 'ClientGuardRequestController@getClientShiftCount');
    Route::post('/clientguardrequest/post/add', 'ClientGuardRequestController@addGuard');
    Route::post('/clientguardrequest/post/swap', 'ClientGuardRequestController@swapGuard');
    Route::post('/clientguardrequest/post/remove', 'ClientGuardRequestController@removeGuard');

    Route::get('/clientgunrequest', 'ClientGunRequestController@index');
    Route::get('/clientgunrequest/get/activegun', 'ClientGunRequestController@getActiveGun');
    Route::get('/clientgunrequest/get/addGunRequest', 'ClientGunRequestController@getAddGunRequest');
    Route::get('/clientgunrequest/get/hasSwapGunRequest', 'ClientGunRequestController@hasSwapGunRequest');
    Route::get('/clientgunrequest/get/SwapGunRequestInformation', 'ClientGunRequestController@getSwapGunRequestInformation');
    Route::get('/clientgunrequest/get/RemoveGunRequestInformation', 'ClientGunRequestController@getRemoveGunRequestInformation');
    Route::post('/clientgunrequest/post/insertAddGunRequest', 'ClientGunRequestController@insertAddGunRequest');
    Route::get('/clientgunrequest/post/declineAddGunRequest', 'ClientGunRequestController@declineAddGunRequest');
    Route::post('/clientgunrequest/post/insertSwapGunRequest', 'ClientGunRequestController@insertSwapGunRequest');
    Route::get('/clientgunrequest/post/declineSwapGunRequest', 'ClientGunRequestController@declineSwapGunRequest');
    Route::post('/clientgunrequest/post/insertRemoveGunRequest', 'ClientGunRequestController@insertRemoveGunRequest');
    Route::post('/clientgunrequest/post/acceptRemoveGunRequest', 'ClientGunRequestController@acceptRemoveGunRequest');
    Route::post('/clientgunrequest/post/declineRemoveGunRequest', 'ClientGunRequestController@declineRemoveGunRequest');


    Route::get('/clientguardattendance', 'ClientGuardAttendanceController@index');
    Route::get('/clientsettings', 'ClientSettingsController@index');
    Route::post('/clientsettings/update', 'ClientSettingsController@update');
    Route::post('/clientsettings/update/macaddress', 'ClientSettingsController@updateMacAddress');
	Route::get('/clientinbox', 'ClientInboxController@index');
    Route::get('/clientinbox/get/SwapGuardRequestAccepted', 'ClientInboxController@getSwapGuardRequestAccepted');
	Route::get('/clientcgrmodule', 'ClientCGRModuleController@index');


//PDF ----------------------------------------------------
Route::get('/getContract', 'PDFContractController@getContract');
Route::get('/getDelivery', 'PDFDeliveryController@getDelivery');
Route::get('/getPayment',  'PDFPaymentController@getPayment');
Route::get('/getTrackTransferRec', 'PDFTrackTransferRecordController@getTrackTransfer');


//Settings -----------------------------------------------
Route::get('/settings', 'SettingsController@index');


//Reports ------------------------------------------------
Route::get('/reports/ReportClient', 'ReportClientController@index');

Route::get('/reports/ReportGuard', 'ReportGuardController@index');
Route::get('/reports/ReportGuard/get/PieInformation', 'ReportGuardController@getPieInformation');


Route::get('/reports/ReportGun', 'ReportGunController@index');
Route::get('/reports/ReportRequest', 'ReportRequestController@index');




Route::get('/adminannouncement', 'AdminAnnouncementViewController@index');
Route::get('/adminannouncement/get', 'AdminAnnouncementViewController@get');
Route::post('/adminannouncement/create', 'AdminAnnouncementViewController@create');
Route::post('/adminannouncement/update', 'AdminAnnouncementViewController@update');
Route::post('/adminannouncement/delete', 'AdminAnnouncementViewController@delete');

Route::get('/admin/home', 'AdminHomeController@index');

Route::get('/guardView', 'GuardViewController@index');
Route::get('/getInformation', 'GuardViewController@getInformationGuard');


Route::get('/clientView', 'ClientViewController@index');
Route::get('/clientView/get/clientpending', 'ClientViewController@getClientPending');
Route::get('/clientView/get/guardaccept', 'ClientViewController@getGuardAccept');
Route::get('/clientView/get/selectedclientpending', 'ClientViewController@getSelectedClientPending');
Route::get('/clientView/get/guardcount', 'ClientViewController@getGuardAccepted');
Route::get('/clientView/get/client', 'ClientViewController@getClient');
Route::post('/clientView/send/clientPendingID', 'ClientViewController@post');
Route::post('/clientView/delete/clientPending', 'ClientViewController@deleteClientPending');


Route::get('/client/registration/basicInfo', 'ClientRegistrationController@index')->name('basicInfoBC');
Route::post('/client/registration/basicInfo/insert', 'ClientRegistrationController@insert');


Route::get('/guard/deployment', 'GuardDeploymentController@index');

Route::get('/gun/tagging', 'GunTaggingController@index');




Route::get('/gunDeliveryView', 'GunDeliveryViewController@index');
Route::get('/gunDeliveryView/get/deliveryinformation', 'GunDeliveryViewController@getDeliveryInformation');
Route::get('/gunDeliveryCart', 'GunDeliveryCartController@index');
Route::get('/gunDeliveryCart/get/gunorderdetail', 'GunDeliveryCartController@getGunOrderDetail');
Route::post('/gunDeliveryCart/post/gunorderdetail', 'GunDeliveryCartController@postSelectedGun');
Route::get('/gunDelivery', 'GunDeliveryController@index');
Route::post('/gunDelivery/post/delivery', 'GunDeliveryController@postDelivery');


Route::get('/gun/registration', 'GunRegistrationController@index');
Route::post('/gun/registration', 'GunRegistrationController@insert');

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



