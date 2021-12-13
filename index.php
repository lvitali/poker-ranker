<?php

use PokerRanker\Game;

require 'vendor/autoload.php';

$game = new Game(2, 5);

$hands = [
    "2C 2S 8H 8D 8S",
    "5C 5S 5H 5D AS"
];

$game->start($hands);
