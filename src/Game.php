<?php

namespace PokerRanker;

use Exception;

class Game
{
    private int $numberOfPlayers;
    private int $numberOfCards;

    public function __construct(int $numberOfPlayers, int $numberOfCards)
    {
        if ($numberOfPlayers > 2 && $numberOfPlayers < 6) {
            throw new Exception("A game must have a min of 2 players and a maximum of 6");
        }

        $this->numberOfPlayers = $numberOfPlayers;
        $this->numberOfCards = $numberOfCards;
    }

    /**
     * @param string[]
     * @return void
     */
    public function start(array $hands)
    {
        $this->hasEnoughHandsOrFail($hands);

        $playerHands = $this->generatePlayerHands($hands, new HandRanker());

        usort($playerHands, fn(PlayerHand $right, PlayerHand $left) => $right->getRanking() > $left->getRanking() ?  : 1);

        foreach ($playerHands as $index => $hand ) {
            $position = $index + 1;
            echo "$position - $hand\n";
        }
    }

    /**
     * @param string[]
     * @return PlayerHand[]
     */
    public function generatePlayerHands(array $hands, HandRanker $handRanker): array
    {
        $playerHands = [];
        foreach($hands as $hand) {
            $playerHands[] = new PlayerHand($this->numberOfCards, $hand, $handRanker);
        }

        return $playerHands;
    }

    private function hasEnoughHandsOrFail(array $hands): void
    {
        if (count($hands) !== $this->numberOfPlayers) {
            throw new Exception("The number of hands must be equal the number of players");
        }
    }
}