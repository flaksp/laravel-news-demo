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

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'articles'], function () {
    Route::get('/',        'ArticlesController@index')->name('listing_of_articles');
    Route::get('/create',  'ArticlesController@manage')->name('create_article');
    Route::post('/create', 'ArticlesController@create');

    Route::get('/{id}',        'ArticlesController@view')->name('view_article')->where('id', '[0-9]+');
    Route::get('/{id}/edit',   'ArticlesController@manage')->name('edit_article')->where('id', '[0-9]+');
    Route::post('/{id}/edit',  'ArticlesController@update')->where('id', '[0-9]+');

    Route::get('/search',       'SearchController@listing')->name('tags_listing');
    Route::get('/search/{tag}', 'SearchController@search')->name('search_by_tag')->where('tag', '.+');
});

//Auth::routes();
