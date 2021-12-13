<?php

namespace Tests;

use PokerRanker\Cards\Card;
use PokerRanker\HandRanker;
use PokerRanker\PlayerHand;
use PHPUnit\Framework\TestCase;

class PlayerHandTest extends TestCase
{
    /**
     * @test
     * @dataProvider handsDataProvider
     */
    public function cards_should_always_be_sorted_by_rank(string $cards, string $expectFirstCard, string $expectedLastCard): void
    {
        $hand = new PlayerHand(5, $cards, new HandRanker());

        $this->assertEquals($expectFirstCard, $hand->getHighCard()->toString());
        $this->assertEquals($expectedLastCard, $hand->getLowerCard()->toString());
    }

    public function handsDataProvider(): array
    {
        return [
            ["KD AS 2D 3S 4H", "AS", "2D"],
            ["KC 3S 4H 8H QC", "KC", "3S"],
        ];
    }
}
