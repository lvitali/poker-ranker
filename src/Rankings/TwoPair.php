<?php

namespace PokerRanker\Rankings;

class TwoPair implements HandCardRanking
{
    public function getRank(): int
    {
        return 3;
    }
}