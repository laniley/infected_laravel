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

Route::group([
  'prefix' => '/api/',
  'middleware' => 'cors',
], function()
{
    Route::group([
        'middleware' => 'auth.fb'
    ], function() {
	// 	Route::put('users/{id}/updateTutorialStep', 'UserController@updateTutorialStep');
		Route::resource('userQuests', 'UserQuestController');

		Route::resource('labs', 'LabController');

        Route::resource('rockets', 'RocketController');
		Route::resource('rocketComponents', 'RocketComponentController');
        Route::resource('rocketComponentTypes', 'RocketComponentTypeController');
		Route::resource('rocketComponentModels', 'RocketComponentModelController');
		Route::resource('rocketComponentModelMms', 'RocketComponentModelMmController');
    });

	Route::resource('users', 'UserController');
});
