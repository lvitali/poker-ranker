#Poker Ranker

The exercise today will be to rank a set of poker hands for 2-6 players from a standard 52 card playing deck. You do not need to do anything other than rank the hands of the 5 cards initially issued to each player, but if you build a frontend UX around this it will be considered as extra credit.
For a reference on how to rank poker hands, please see this page (https://en.wikipedia.org/wiki/List_of_poker_hands). Please note that an Ace can be high or low. In other words, an ace could make a straight with A, 2, 3, 4, 5 - or it could be 10, J, Q, K, A.
As previously noted, I will be looking at the following things in your submission:
1. Code structure & cleanliness
2. Maintainability/Readability
3. Testability
4. Demonstration of best practices and command of the language (primarily PHP, optionally using a framework of your choosing as desired - preferably Laravel)

## Instructions
The hand notation is a string containing cards in the format VS where V is the value
of a card and S is the suit. Each card is separated by space like the following string:
"2C 2S 8H 8D 8S".

The game should be created informing the number of players and the number of cards.
The game start method accepts an array with the same length of numberOfPlayers containg card notations
that have the same amount of cards defined in the game class. 

## Notes
I couldn't finish the challenge, that are not implemented:
    
* A Tiebreaker criteria, when the hands are of equal rank, the hand with the highest card should win
* Build a game by select the rules that must be applied, in ace-to-five low Straight Flush, Flush and Straight does not apply as rules
* The isStraight method int HandRanker could be better implemented
* I wrote no tests for the Game class
* Maybe the classes that implement HandCardRanking should validate the rank, so they can be injected on HandCardRanker
* There no validation if a card is already used in another hand, leading to wrong results
* There are no appropriate git commits

   