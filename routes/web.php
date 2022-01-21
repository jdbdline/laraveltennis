<?php

use Illuminate\Support\Facades\Route;
use App\Classes\Game;
use Illuminate\Http\Request;


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



//static $test ='';

Route::get('/', function () {


    //return view('welcome')->with('game', new Game);
    return view('welcome');
});

Route::get('/score', function (Request $request) {
    

    

    game::setPlayer1($request->all('player1score')['player1score']);
    game::setPlayer2($request->all('player2score')['player2score']);
   

    echo  game::scoreboard();
    


});
