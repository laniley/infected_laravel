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
    Route::resource('users', 'UserController');
	Route::resource('infectionSkills', 'InfectionSkillController');
	Route::resource('infectionSkillTypes', 'InfectionSkillTypeController');

    Route::group([
        'middleware' => 'auth.fb'
    ], function() {
        Route::resource('infections', 'InfectionController');
        Route::resource('infectionSkillProgresses', 'InfectionSkillProgressController');
    });
});
