<?php

class PadelScore
{
    private int $score1 = 0;
    private int $score2 = 0;

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->score1++;
        } else {
            $this->score2++;
        }
    }

    public function calculateScore(): string
    {
        if ($this->score1 === $this->score2) {
            if ($this->score1 >= 3) {
                return 'Deuce';
            } else {
                return $this->getScoreDescription($this->score1) . '-All';
            }
        } elseif ($this->score1 >= 4 || $this->score2 >= 4) {
            $difference = $this->score1 - $this->score2;
            if (abs($difference) === 1) {
                $leadingPlayer = $difference > 0 ? 'player1' : 'player2';
                return 'Advantage ' . $leadingPlayer;
            } else {
                $winningPlayer = $difference > 0 ? 'player1' : 'player2';
                return 'Win for ' . $winningPlayer;
            }
        } else {
            $score1Description = $this->getScoreDescription($this->score1);
            $score2Description = $this->getScoreDescription($this->score2);
            return $score1Description . '-' . $score2Description;
        }
    }

    private function getScoreDescription(int $score): string
    {
        switch ($score) {
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
            default:
                return '';
        }
    }
}


?>