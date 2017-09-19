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

//메인페이지
Route::get('/', 'HomeController@index')->name('index');
//검색
Route::post('/search', 'DictionaryController@search')->name('search');
//저장
Route::post('/save','DictionaryController@save');
//검색 결과 페이지
Route::get('/wordList', 'HomeController@wordList')->name('wordList');
//저장된 단어 페이지
Route::get('/saveWord','HomeController@saveWordList')->name('saveWordList');
// Route::post('/search')