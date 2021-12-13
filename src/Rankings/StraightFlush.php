<?php

namespace PokerRanker\Rankings;

class StraightFlush implements HandCardRanking
{
    public function getRank(): int
    {
        return 1;
    }
}