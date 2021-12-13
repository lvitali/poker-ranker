<?php

namespace Tests\Fixture;

class CardHandFixture
{
    public static function createOnePairHandNotation(): string
    {
        return "10S 10C 8S 7H 4C";
    }

    public static function createHighCardHandNotation(): string
    {
        return "KH JH 8C 7D 4S";
    }

    public static function createStraightHand(): string
    {
        return "KH QH JC 10D 9S";
    }

    public static function createFlushHand(): string
    {
        return "2H 3H 5H JH AH";
    }

    public static function createStraightFlushHand(): string
    {
        return "10H 9H 8H 7H 6H";
    }

    public static function createFourOfAKindHand(): string
    {
        return "5C 5S 5H 5D AS";
    }

    public static function createThreeOfAKindHand(): string
    {
        return "5C 5S 5H 8D AS";
    }

    public static function createTwoPairHand(): string
    {
        return "5C 5S 8H 8D AS";
    }

    public static function createFullHouseHand(): string
    {
        return "2C 2S 8H 8D 8S";
    }

    public static function createAceHighStraightHand(): string
    {
        return "AH KH QC JD 10S";
    }

    public static function createFiveHighStraightHand(): string
    {
        return "5H 4H 3C 2D AS";
    }
}