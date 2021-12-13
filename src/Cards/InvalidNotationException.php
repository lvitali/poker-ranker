<?php

namespace PokerRanker\Cards;

use InvalidArgumentException;

class InvalidNotationException extends InvalidArgumentException
{
    public static function invalidSuit(): self
    {
        throw new self("Invalid suit. Valid suits are C, D, H, S");
    }

    public static function invalidValue(): self
    {
        throw new self("Invalid card value. Valid values are A, K, Q, J, 10, 9, 8, 7, 6, 5, 3, 2");
    }

    public static function invalidLength(): self
    {
        throw new self("Invalid length for card notation, should be between 2 and 3");
    }
}