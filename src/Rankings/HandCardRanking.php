<?php

namespace PokerRanker\Rankings;

interface HandCardRanking
{
    public function getRank(): int;
}