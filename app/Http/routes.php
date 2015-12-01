<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/recomendacao',[ 'as' => 'teste', 'uses' => 'PredictionController@index' ]);
Route::get('/usuario/{id}',[ 'as' => 'user', 'uses' => 'PredictionController@user' ]);
Route::get('/usuarios',[ 'as' => 'users', 'uses' => 'PredictionController@users' ]);
Route::get('/filme/{id}',[ 'as' => 'movie', 'uses' => 'PredictionController@movie' ]);
Route::get('/filmes',[ 'as' => 'movies', 'uses' => 'PredictionController@movies' ]);
/*
Route::get('/filmes/from-imdb',[ 'as' => 'mobies.imdb', 'uses' => 'MovieController@getFromIMDB' ]);
*/
Route::post('/filmes/insert',[ 'as' => 'movies.insert', 'uses' => 'MovieController@insertMovies' ]);

