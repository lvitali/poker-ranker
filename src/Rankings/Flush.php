<?php

namespace PokerRanker\Rankings;

class Flush implements HandCardRanking
{
    public function getRank(): int
    {
        return 4;
    }
}