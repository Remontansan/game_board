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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/gameboard', 'GameBoardController');
Route::get('/gameboard/reply/{id}', 'GameBoardController@reply')->name('reply');
Route::post('/gameboard/replyStore/', 'GameBoardController@replyStore')->name('replyStore');
Route::get('/gameboard/reply_to_reply/{id}','GameboardController@reply_to_reply')->name('reply_to_reply');
Route::post('/gameboard/reply_to_reply_Store', 'GameBoardController@reply_to_reply_Store')->name('reply_to_reply_Store');

Route::get('/profile','ProfileController@profile')->name('profile');
Route::post('/profileStore','ProfileController@profileStore')->name('profileStore');

Route::get('/matching/matching_start', 'MatchingController@matching_start')->name('matching_start');
Route::resource('/matching', 'MatchingController');

Route::get('/friend/requestList', 'FriendController@friendRequestList')->name('friendRequestList');
Route::resource('/friend', 'FriendController');

Route::get('/friend/request/{id}', 'FriendController@friendRequest')->name('friendRequest');
Route::get('/friend/request/matching/{id}', 'FriendController@friendRequestFromMatching')->name('friendRequestFromMatching');

Route::get('/friend/request/approval/{id}', 'FriendController@friendRequestApproval')->name('friendRequestApproval');
Route::get('/friend/request/rejection/{id}', 'FriendController@friendRequestRejection')->name('friendRequestRejection');




