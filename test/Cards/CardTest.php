<?php

namespace Tests\Cards;

use PHPUnit\Framework\TestCase;
use PokerRanker\Cards\Card;

class CardTest extends TestCase
{
    /**
     * @test
     * @dataProvider validCardNotationsDataProvider
     */
    public function it_must_create_a_card_from_string_notation(string $notation): void
    {
        $actualClass = Card::fromNotation($notation);

        $expectedClass = Card::class;

        $this->assertInstanceOf($expectedClass, $actualClass);
    }

    /**
     * @test
     * @dataProvider validCardNotationsWithValueAndSuitDataProvider
     */
    public function it_must_have_correct_card_and_suit(string $notation, string $expectedValue, string $expectedSuit)
    {
        $card = Card::fromNotation($notation);

        $this->assertEquals($expectedValue, $card->getValue());
        $this->assertEquals($expectedSuit, $card->getSuit());
    }

    /**
     * @test
     * @dataProvider validCardNotationWithRank
     */
    public function it_must_have_correct_rank(string $notation, int $expectedRank)
    {
        $card = Card::fromNotation($notation);

        $this->assertEquals($expectedRank, $card->getRank());
    }

    public function validCardNotationsDataProvider(): array
    {
        return [
            ["AS"],
            ["4D"],
            ["10C"],
            ["JH"],
            ["QD"],
        ];
    }

    public function invalidCardNotationsDataProvider(): array
    {
        return [
            ["ZS"],
            ["AF"],
            ["1S"],
            ["4P"],
            ["F3A"],
            ["a1234"],
        ];
    }

    public function validCardNotationsWithValueAndSuitDataProvider(): array
    {
        return [
            ["AS", "A", "S"],
            ["4D", "4", "D"],
            ["10C", "10", "C"],
            ["JH", "J", "H"],
            ["QD", "Q", "D"],
        ];
    }

    public function validCardNotationWithRank(): array
    {
        return [
            ["AS", 14],
            ["4D", 4],
            ["10C", 10],
            ["JH", 11],
            ["QD", 12],
            ["KD", 13 ],
        ];
    }
}
