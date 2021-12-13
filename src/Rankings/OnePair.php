<?php

namespace PokerRanker\Rankings;

class OnePair implements HandCardRanking
{
    public function getRank(): int
    {
        return 2;
    }
}