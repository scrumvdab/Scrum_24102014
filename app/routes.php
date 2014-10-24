<?php

$html = 'test';
$string = 'testtest';
$pdf = 'test';

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('activiteiten', [
    'as' => 'activiteiten',
    'uses' => 'ActiviteitenController@main'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'ContactController@main'
]);

Route::get('leden', [
    'as' => 'leden',
    'uses' => 'LedenController@main'
]);

Route::get('vrijwilligers', [
    'as' => 'vrijwilligers',
    'uses' => 'VrijwilligersController@main'
]);

Route::get('forum', [
    'as' => 'forum',
    'uses' => 'ForumController@main'
]);

Route::get('giften', [
    'as' => 'giften',
    'uses' => 'GiftenController@main'
]);

Route::get('links', [
    'as' => 'links',
    'uses' => 'LinksController@main'
]);

//authentication
Route::controller('users', 'UsersController');

// active link
HTML::macro('clever_link', function($route, $text) {
    if (Request::path() == $route) {
        $active = "class = 'active'";
    } else {
        $active = '';
    }

    return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
});

Route::get('PDF', function() {
    $pdf = View::make('PDF');
    $pdf->render();
    return PDF::load($pdf, 'A4', 'portrait')->show();
    
});

Route::get('/', array('uses' => 'ForumController@index', 'as' => 'forum'));

Route::group(array('prefix' => '/forum'), function() {
    Route::get('/', array('uses' => 'ForumController@index', 'as' => 'forum-home'));
    Route::get('/category/{id}', array('uses' => 'ForumController@category', 'as' => 'forum-category'));
    Route::get('/thread/{id}', array('uses' => 'ForumController@thread', 'as' => 'forum-thread'));

    /* 'admin' ipv 'auth' 16/10/2014 */

    Route::group(array('before' => 'admin'), function() {
        Route::get('/group/{id}/delete', array('uses' => 'ForumController@deleteGroup', 'as' => 'forum-delete-group'));
        Route::group(array('before' => 'csrf'), function() {
            Route::post('/group', array('uses' => 'ForumController@storeGroup', 'as' => 'forum-store-group'));
        }
        );
    }
    );
});


Route::group(array('before' => 'guest'), function() {
    Route::get('/user/create', array('uses' => 'ForumUserController@getCreate', 'as' => 'getCreate'));
    Route::get('/user/login', array('uses' => 'ForumUserController@getLogin', 'as' => 'getLogin'));
    Route::group(array('before' => 'csrf'), function() {
        Route::post('/user/create', array('uses' => 'ForumUserController@postCreate', 'as' => 'postCreate'));
        Route::post('/user/login', array('uses' => 'ForumUserController@postLogin', 'as' => 'postLogin'));
    });
});
