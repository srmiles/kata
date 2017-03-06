<?php
include("Player.php");

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{

    /**
     * @test
     */
    public function rollGutterGame() {
        $player = new Player('Test');
        $player->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0)
               ->roll(0)->roll(0);
        $this->assertEquals(0,$player->score());
    }

    /**
     * @test
     */
    public function rollAllOnes() {
        $player = new Player('Test');
        $player->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1)
               ->roll(1)->roll(1);
        $this->assertEquals(20,$player->score());
    }
    /**
     * @test
     */
    public function rollOneSpare() {
        $player = new Player('Test');
        $player->roll(9)->roll(1)
               ->roll(3);
        $this->assertEquals(16,$player->score());
    }

    /**
     * @test
     */
    public function rollOneStrike() {
        $player = new Player('Test');
        $player->roll(10)
               ->roll(3)->roll(4);
        $this->assertEquals(24,$player->score());
    }

    /**
     * @test
     */
    public function rollPerfectGame() {
        $player = new Player('Test');
        $player->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10);
        $this->assertEquals(300,$player->score());
    }

    /**
     * @test
     */
    public function rollAlmostPerfectGame() {
        $player = new Player('Test');
        $player->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)
               ->roll(10)->roll(9)->roll(1);
        $this->assertEquals(289,$player->score());
    }
    /**
     * @test
     */
    public function rollSampleGame() {
        $player = new Player('Test');
        $player->roll(10);

        $this->assertEquals(10,$player->score());
        $player->roll(7)->roll(3);
        $this->assertEquals(30,$player->score());

        $player->roll(9)->roll(0)
               ->roll(10)
               ->roll(0)->roll(8)
               ->roll(8)->roll(2)
               ->roll(0)->roll(6)
               ->roll(10)
               ->roll(10)
               ->roll(10)->roll(8)->roll(1);
        $this->assertEquals(167,$player->score());
    }

}