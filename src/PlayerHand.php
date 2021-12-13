<?php

namespace PokerRanker;

use PokerRanker\Cards\Card;
use PokerRanker\Rankings\HandCardRanking;

class PlayerHand
{
    /**
     * @var Card[]
     */
    private array $cards = [];
    private int $numberOfCards;
    private HandCardRanking $ranking;

    public function __construct(int $numberOfCards, string $notation, HandRanker $handRanker)
    {
        $this->numberOfCards = $numberOfCards;

        $cards = explode(" ", $notation);

        if (count($cards) > $numberOfCards) {
            throw new \InvalidArgumentException("Notation must provide $numberOfCards cards");
        }

        foreach ($cards as $card) {
            $this->addCard(Card::fromNotation($card));
        }

        $this->sort();
        $this->ranking = $handRanker->rank($this);
    }

    public function size(): int
    {
        return $this->numberOfCards;
    }

    private function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    /**
     * @return Card[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function getHighCard(): Card
    {
        return $this->getCards()[0];
    }

    public function getLowerCard(): Card
    {
        return $this->cards[$this->size() - 1];
    }

    private function sort(): void
    {
        usort($this->cards,
            fn (Card $right, Card $left) => $right->getRank() > $left->getRank() ? -1 : 1
        );
    }

    public function getRanking(): HandCardRanking
    {
        return $this->ranking;
    }

    public function __toString(): string
    {
        $notation = "";

        foreach ($this->cards as $card) {
            $notation .= $card->toString() . " ";
        }

        return $notation;
    }
}