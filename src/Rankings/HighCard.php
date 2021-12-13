<?php

namespace PokerRanker\Rankings;

class HighCard implements HandCardRanking
{
    public function getRank(): int
    {
        return 1;
    }
}