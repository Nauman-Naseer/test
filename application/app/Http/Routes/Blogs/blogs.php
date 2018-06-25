<?php
/**
 * Created by Sublime Text.
 * Users: Lincoln
 * Date: 21/05/16
 * Time: 08:41 PM
 */

Route::group(['middleware' => ['web','install']], function(){
    Route::get('blogs/{categoryName}', 'BlogsController@category');
    Route::get('blogs/{id}/{title}', 'BlogsController@blog');
    Route::resource('blogs', 'BlogsController');
});