<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1',  'middleware' => 'cors'], function()
{
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::get('/all/topics', 'TopicController@getAllTopics');
    Route::post('topic/{topicId}', 'QuestionController@getQuestionFromTopic');

    // social logins
    Route::get('auth/{provider}', 'AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
});
