<?php

namespace PokerRanker\Rankings;

class FourOfAKind implements HandCardRanking
{
    public function getRank(): int
    {
        return 2;
    }
}