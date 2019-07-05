<?php
// <<1강>> - View//
//
// 사용자 '/' URL로 접급
/*
Route::get('/', function () {
    //return '안녕하세요~';
    return view('welcome');
});
*/
Route::get('/','MainController@index');
//====================================================
Route::get('/slave', function () {
    $items = [
        '하이',
        '명수',
        '세민'
    ];
    return view('slave', compact('items'));
});

//====================================================
Route::get('/profile', function () {
    
    $view = view('profile');
    $view->greeting = "안녕하세요";
    $view->name = '김연준';
    $view->profile = '위에 있는 것은 값을 받아와 표시한 것 입니다.';
    return $view;
});

// profileTwo = user/profile 지정
Route::get('user/profile',['as' => 'profileTwo',
'uses' =>'ProfileController@profile']);

// 이름 지정 함수 profileTwo은 위에서 user/profile이다.
// ProfileController@profile를 호출 할 수 있는 url을 알려준다.
Route::get('profileTwo', function () {
    return route('profile');
});

//====================================================
// <<2강>> - Model, Controller
/*
Route::get('pages/aboutus', 'PageController@aboutus');
Route::get('pages/location', 'PageController@location');
Route::get('pages/copyright', 'PageController@copyright');
*/
// 손쉽게
Route::get('/page/{pageId}','PageController@page');

//====================================================
Route::get('basicdb','BasicDBController@index');
Route::post('/todo', 'TodoController@store'); 
// post 방식이므로 post 지정
Route::post('/todo/done/{id}', 'TodoController@done'); 
Route::resource('todo','TodoController');

//====================================================
// <<3강>> - 게시판
Route::resource('/board','BoardController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
