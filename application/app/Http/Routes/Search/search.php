<?php
/**
 * Search Route
 * Created by PhpStorm.
 * Users: mithun
 * Date: 11/30/15
 * Time: 10:04 PM
 */
Route::group(['middleware' => ['web']], function(){
    Route::resource('search', 'SearchController');
});