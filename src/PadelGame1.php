<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

use PadelScore;

class PadelGame1 implements PadelGame
{
    private PadelScore $score;
    private string $player1;
    private string $player2;

    public function __construct(string $player1, string $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->score = new PadelScore();
    }

    public function wonPoint(string $playerName): void
    {
        $this->score->wonPoint($playerName);
    }

    public function getScore(): string
    {
        return $this->score->calculateScore();
    }
}
