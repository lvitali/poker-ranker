<?php

namespace PokerRanker\Rankings;

class FullHouse implements HandCardRanking
{
    public function getRank(): int
    {
        return 3;
    }
}