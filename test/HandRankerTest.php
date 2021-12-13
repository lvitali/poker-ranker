<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PokerRanker\HandRanker;
use PokerRanker\PlayerHand;
use PokerRanker\Rankings\Flush;
use PokerRanker\Rankings\FourOfAKind;
use PokerRanker\Rankings\FullHouse;
use PokerRanker\Rankings\HandCardRanking;
use PokerRanker\Rankings\HighCard;
use PokerRanker\Rankings\OnePair;
use PokerRanker\Rankings\Straight;
use PokerRanker\Rankings\StraightFlush;
use PokerRanker\Rankings\ThreeOfAKind;
use PokerRanker\Rankings\TwoPair;
use Tests\Fixture\CardHandFixture;

class HandRankerTest extends TestCase
{
    /**
     * @test
     * @dataProvider handsDataProvider
     */
    public function it_should_return_correct_rank(string $cardNotations, HandCardRanking $expectedRank): void
    {
        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();
        $this->assertEquals($expectedRank->getRank(), $handRanker->rank($hand)->getRank());
    }

    public function handsDataProvider(): array
    {
        return [
            [CardHandFixture::createHighCardHandNotation(), new HighCard],
            [CardHandFixture::createStraightHand(), new Straight],
            [CardHandFixture::createFlushHand(), new Flush],
            [CardHandFixture::createStraightFlushHand(), new StraightFlush],
            [CardHandFixture::createFourOfAKindHand(), new FourOfAKind],
            [CardHandFixture::createThreeOfAKindHand(), new ThreeOfAKind],
            [CardHandFixture::createTwoPairHand(), new TwoPair],
            [CardHandFixture::createOnePairHandNotation(), new OnePair],
            [CardHandFixture::createFullHouseHand(), new FullHouse]
        ];
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_are_straight(): void
    {
        $cardNotations = CardHandFixture::createStraightHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isStraight($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_are_flush(): void
    {
        $cardNotations = CardHandFixture::createFlushHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isFlush($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_are_straight_flush(): void
    {
        $cardNotations = CardHandFixture::createStraightFlushHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isStraightFlush($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_is_four_of_a_kind(): void
    {
        $cardNotations = CardHandFixture::createFourOfAKindHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isFourOfAKind($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_is_three_of_a_kind(): void
    {
        $cardNotations = CardHandFixture::createThreeOfAKindHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isThreeOfAKind($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_hand_is_two_pair(): void
    {
        $cardNotations = CardHandFixture::createTwoPairHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isTwoPair($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_hand_is_one_pair(): void
    {
        $cardNotations = CardHandFixture::createOnePairHandNotation();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isOnePair($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_when_cards_are_full_house(): void
    {
        $cardNotations = CardHandFixture::createFullHouseHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isFullHouse($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_for_a_ace_high_straight(): void
    {
        $cardNotations = CardHandFixture::createAceHighStraightHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isStraight($hand));
    }

    /**
     * @test
     */
    public function it_must_return_true_for_a_five_high_straight(): void
    {
        $cardNotations = CardHandFixture::createFiveHighStraightHand();

        $hand = new PlayerHand(5, $cardNotations, new HandRanker());

        $handRanker = new HandRanker();

        $this->assertTrue($handRanker->isStraight($hand));
    }
}
