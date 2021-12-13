<?php

namespace PokerRanker\Rankings;

class ThreeOfAKind implements HandCardRanking
{
    public function getRank(): int
    {
        return 4;
    }
}