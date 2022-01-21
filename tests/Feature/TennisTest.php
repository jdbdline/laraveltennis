<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Classes\Game;

class TennisTest extends TestCase
{

    public function test_player1_score()
    {
        $game = new Game;
        $game->player1Point();
        $this->assertEquals('Fifteen-Love',$game->scoreboard());
    }

    public function test_player2_score()
    {
        $game = new Game;
        $game->player2Point();
        $this->assertEquals('Love-Fifteen',$game->scoreboard());
    }

    public function test_fifteen_thirty()
    {
        $game = new Game;
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Fifteen-Thirty',$game->scoreboard());
    }

    public function test_thirty_all()
    {
        $game = new Game;
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Thirty All',$game->scoreboard());
    }

    public function test_thirty_love()
    {
        $game = new Game;
        $game->player1Point();
        $game->player1Point();
        $this->assertEquals('Thirty-Love',$game->scoreboard());
    }

    public function test_Deuce()
    {
        $game = new Game;
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Deuce',$game->scoreboard());
    }

    public function test_player1_victory_string()
    {
        $game = new Game;
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Won by Player 1',$game->scoreboard());
    }

    public function test_player2_victory_string()
    {
        $game = new Game;
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player1Point();
        $game->player1Point();
        $this->assertEquals('Won by Player 2',$game->scoreboard());
    }

    public function test_player1_victory_complete()
    {
        $game = new Game;
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertTrue($game->isComplete());
    }

    public function test_player2_victory_complete()
    {
        $game = new Game;
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player1Point();
        $game->player1Point();
        $this->assertTrue($game->isComplete());
    }

    public function test_game_incomplete()
    {
        $game = new Game;
        $game->player2Point();
        $game->player1Point();
        $game->player1Point();
        $this->assertEquals(false,$game->isComplete());
    }

    public function test_advantage_player1()
    {
        $game = new Game;

        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Advantage Player 1',$game->scoreboard());
    }

    public function test_deuce_past_4()
    {
        $game = new Game;

        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Deuce',$game->scoreboard());
    }

    public function test_victory_player1()
    {
        $game = new Game;

        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Won by Player 1',$game->scoreboard());
    }


    public function test_victory_complete_player1_past_4()
    {
        $game = new Game;

        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertTrue($game->isComplete());
    }
    public function test_victory_complete_player2_past_4()
    {
        $game = new Game;

        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player1Point();
        $game->player2Point();
        $game->player2Point();

        $game->player2Point();
        $game->player2Point();
     
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $game->player2Point();
        $this->assertEquals('Won by Player 2',$game->scoreboard());
    }
}
