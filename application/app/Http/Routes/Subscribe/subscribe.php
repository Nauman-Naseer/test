<?php
/**
 * Created by Sublime Text.
 * Users: Lincoln
 * Date: 21/05/16
 * Time: 08:41 PM
 */

Route::group(['middleware' => ['web']], function(){
    Route::resource('subscribe', 'SubscribeController');
});