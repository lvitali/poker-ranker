<?php

namespace PokerRanker;

use PokerRanker\Cards\Card;
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

class HandRanker
{
    public function rank(PlayerHand $hand): HandCardRanking
    {
        if ($this->isStraightFlush($hand)) {
            return new StraightFlush();
        }

        if ($this->isFourOfAKind($hand)) {
            return new FourOfAKind();
        }

        if ($this->isFullHouse($hand)) {
            return new FullHouse();
        }

        if ($this->isFlush($hand)) {
            return new Flush();
        }

        if ($this->isStraight($hand)) {
            return new Straight();
        }

        if ($this->isThreeOfAKind($hand)) {
            return new ThreeOfAKind();
        }

        if ($this->isTwoPair($hand)) {
            return new TwoPair();
        }

        if ($this->isOnePair($hand)) {
            return new OnePair();
        }

        return new HighCard();
    }

    public function isStraightFlush(PlayerHand $hand): bool
    {
        return $this->isStraight($hand) && $this->isFlush($hand);
    }

    public function isStraight(PlayerHand $hand): bool
    {
        $higherCard = $hand->getHighCard();

        if (! $higherCard->isAce()) {
            return $this->areConsecutive($hand->getCards());
        }

        $handWithoutAce = array_slice($hand->getCards(), 1);

        $isSequence = $this->areConsecutive($handWithoutAce);

        if ($isSequence && $handWithoutAce[0]->isKing()) {
            return true;
        }

        if ($isSequence && $handWithoutAce[0]->getRank() === 5) {
            return true;
        }

        return false;
    }

    public function isFlush(PlayerHand $hand): bool
    {
        $isFlush = true;
        $cards = $hand->getCards();

        $suit = $cards[0]->getSuit();

        for ($i = 1; $i < $hand->size() - 2; $i++) {
            if ($cards[$i]->getSuit() !== $suit) {
                $isFlush = false;
            }
        }

        return $isFlush;
    }

    public function isFourOfAKind(PlayerHand $hand): bool
    {
        return $this->hasCountOfSameCard($hand, 4);
    }

    public function isFullHouse(PlayerHand $hand): bool
    {
        return $this->isThreeOfAKind($hand) && $this->isOnePair($hand);
    }

    public function isThreeOfAKind(PlayerHand $hand): bool
    {
        return $this->hasCountOfSameCard($hand, 3);
    }

    public function isOnePair(PlayerHand $hand): bool
    {
        return collect($hand->getCards())
                ->countBy(fn(Card $card) => $card->getRank())
                ->values()
                ->filter(fn(int $n) => $n === 2)
                ->count() === 1;
    }

    public function isTwoPair(PlayerHand $hand): bool
    {
        return collect($hand->getCards())
                ->countBy(fn(Card $card) => $card->getRank())
                ->values()
                ->filter(fn(int $n) => $n === 2)
                ->count() === 2;
    }

    private function hasCountOfSameCard(PlayerHand $hand, int $cardValue): bool
    {
        return collect($hand->getCards())
            ->countBy(fn(Card $card) => $card->getRank())
            ->flip()
            ->has($cardValue);
    }

    private function areConsecutive(array $cards): bool
    {
        $isSequence = true;

        $counter = 0;
        while ($counter < count($cards) - 1) {
            if ($cards[$counter]->getRank() - $cards[$counter + 1]->getRank() !== 1) {
                $isSequence = false;
                break;
            }

            $counter++;
        }

        return $isSequence;
    }
}