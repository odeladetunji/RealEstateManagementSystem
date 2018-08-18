<?php

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
    return view('welcome');
});

Route::get('/adminpage', 'AdminController@adminPage');
Route::get('/estateManagers', 'EstateManagersController@estatemanagers');
Route::get('/landlords', 'LandLordsController@landlords');
/*returns JSON Object */
Route::get('/estateManagersLandLords', 'EstateManagersClientsController@estateManagersClient');
/*returns JSON Object */
Route::get('/landLordsPropertiesAndAgents', 'LandLordsPropertiesAndAgentsController@landLords');
/*returns JSON Object */
Route::get('/AvailablePropertiesController', 'AvailablePropertiesControllerController@availableProperties');
/*returns JSON Object */
Route::get('/viewAvailableProperties', 'ViewAvailablePropertiesController@viewAvailableProperties');

Route::post('/estateManagersPage', 'EstateManagersPageController@estateManagersPage');
Route::post('/listAllProperties', 'ListAllPropertiesController@listAllProperties');
Route::post('/deleteProperty', 'DeletePropertyController@deleteProperty');
Route::post('/adminlogin', 'AdminLoginController@adminPage');
Route::post('/listPropertyLandLord', 'PropertyPostByLandlordController@property');
Route::post('/landlordsPage', 'LandLordsPageController@landlords');
Route::post('/registerLandLord', 'RegisterLandLordController@register');
Route::post('/registerEstateManager', 'RegisterEstateManagerController@register');
Route::post('/checkIfPasswordAvailable', 'PasswordAvailabilityController@password');
Route::get('/landingpage', 'LandingPageController@landingpage');
Route::get('/registrationInterface', 'RegistrationInterfaceController@interface');
Route::get('/returnInterfacePage', ['as'=>'theInterface', function(){
	return view('interface');
}]);
