<?php 
namespace App\Classes;
class Game {
    public static $player1score ;
    public static $player2score ;
    public static $complete ;

    public function __construct() {
        static::$player1score = 0;
        static::$player2score = 0;
        static::$complete = false;
    }

    public function setPlayer1($score){
        if(static::$complete== false){
            static::$player1score = $score;
        }
    }

    public function setPlayer2($score){
        if(static::$complete== false){
            static::$player2score = $score;
        }
    }

    static function scoreToString($score){
        switch ($score) {
            case 0:
              return "Love";
              break;
            case 1:
              return "Fifteen";
              break;
            case 2:
              return "Thirty";
              break;
            case 3:
              return "Forty";
            break;
            default:
              return "Advantage";
          }
        
    }

    public function scoreboard() {

        if(abs(static::$player1score - static::$player2score)==1 ){
            if(static::$player1score>4){
                return "Advantage Player 1";
            }
            if(static::$player2score>4){
                return "Advantage Player 2";
            } 
        }
        if(abs(static::$player1score - static::$player2score)>=2 ){
            if(static::$player1score >= 4 && static::$player1score>static::$player2score ) {
                static::$complete = true;
                return 'Won by Player 1';
            }            
            if(static::$player2score >= 4 && static::$player2score>static::$player1score) {
                static::$complete = true;
                return 'Won by Player 2';
            } 
        } 
        if(static::$player1score === static::$player2score){
            if(static::$player1score >= 4){
                return "Deuce";    
            }else{
                return static::scoreToString(static::$player1score). ' All';  
            }
        }else{
            return static::scoreToString(static::$player1score) .'-'.static::scoreToString(static::$player2score);
        }
    }    

    public function isComplete() {
        if(abs(static::$player1score - static::$player2score)>=2 ){
            if(static::$player1score >= 4) {
                static::$complete = true;
            }            
            if(static::$player2score >= 4) {
                static::$complete = true;
            } 
        } 
        return static::$complete;
    }

    public function player1Point() {
        if(static::$complete== false){
            static::$player1score++; 
        }
    }

    public function player2Point() {
        if(static::$complete== false){
            static::$player2score++; 
        } 
        
    }
}