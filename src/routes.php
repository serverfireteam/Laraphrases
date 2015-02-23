<?php

Route::group(['prefix' => 'laraphrases'], function()
{
    $canEdit = Config::get('laraphrases::phrase.can_edit');
    Route::post('remote-update', ['middleware' => 'RoomsHotels\Http\Middleware\Dedit\auth', 'uses' => 'LaraphraseController@postRemoteUpdate']);
});