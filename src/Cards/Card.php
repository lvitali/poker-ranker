<?php

namespace PokerRanker\Cards;

class Card
{
    private string $value;
    private string $suit;
    private int $rank;

    private const VALID_VALUES = ["A", "K", "Q", "J", "10", "9", "8", "7", "6", "5", "4", "3", "2"];
    private const VALID_SUITS = ["C", "D", "H", "S"];

    private function __construct(string $value, string $suit)
    {
        $this->value = $value;
        $this->suit = $suit;
        $this->rank = $this->rankValue($value);
    }

    public static function fromNotation(string $notation): Card
    {
        $length = strlen($notation);

        if ($length === 0 || $length > 3) {
            InvalidNotationException::invalidLength();
        }

        list($value, $suit) = self::extractValueAndSuit($notation, $length);

        self::validateNotation($value, $suit);

        return new Card($value, $suit);
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function isAce(): bool
    {
        return $this->rank === 14;
    }

    public function isKing(): bool
    {
        return $this->rank === 13;
    }

    public function toString(): string
    {
        return $this->value . $this->suit;
    }

    private function rankValue(string $value): int
    {
        switch ($value) {
            case "A":
                return 14;
            case "K":
                return 13;
            case "Q":
                return 12;
            case "J":
                return 11;
            default:
                return (int)$value;
        }
    }

    private static function validateNotation(string $value, string $suit): void
    {
        if (!in_array($value, self::VALID_VALUES)) {
            InvalidNotationException::invalidValue();
        }

        if (!in_array($suit, self::VALID_SUITS)) {
            InvalidNotationException::invalidSuit();
        }
    }

    private static function extractValueAndSuit(string $notation, int $length): array
    {
        if ($length === 3) {
            return str_split($notation, 2);
        }

        return str_split($notation);
    }
}