<?php

namespace PokerRanker\Rankings;

class Straight implements HandCardRanking
{
    public function getRank(): int
    {
        return 5;
    }
}