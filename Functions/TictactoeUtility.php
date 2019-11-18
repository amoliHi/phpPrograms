<?php

/**
 * Program to play a Cross Game or Tic­Tac­Toe Game. Player 1 is
 * the Computer and the Player 2 is the user. Player 1 take Random Cell that is the
 * Column and Row.
 */

class TictactoeUtility
{

    // creating a 2D empty array  
    public static $board = array(array(), array());
    public static $player = 1;
    public static $isempty = true;

    /**
     * initBoard()- function to initialize the empty board
     */
    function initBoard()
    {
        echo "TicTacTOe Game\n\n";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                self::$board[$i][$j] = -10;
            }
        }
        echo "Player is X \n";
    }

    /**
     * dispBoard()- function print or display the board on the console
     * for every turn played
     */
    function dispBoard()
    {
        $count = 0;
        for ($i = 0; $i < 3; $i++) {
            echo "---------------\n";
            echo "||";

            for ($j = 0; $j < 3; $j++) {
                if (self::$board[$i][$j] == 0) {
                    $count++;
                    echo " O |";
                } else if (self::$board[$i][$j] == 1) {
                    $count++;
                    echo " X |";
                } else {
                    echo "   |";
                }
            }
            echo "|\n";
            if ($count == 9) {
                self::$isempty == false;
            }
            echo "---------------\n";
        }
    }

    /**
     * win()- function to check for wins
     */
    function win()
    {
        return ((self::$board[0][0] + self::$board[0][1] + self::$board[0][2] == self::$player * 3)
            || (self::$board[1][0] + self::$board[1][1] + self::$board[1][2] == self::$player * 3)
            || (self::$board[2][0] + self::$board[2][1] + self::$board[2][2] == self::$player * 3)
            || (self::$board[0][0] + self::$board[1][0] + self::$board[2][0] == self::$player * 3)
            || (self::$board[0][1] + self::$board[1][1] + self::$board[2][1] == self::$player * 3)
            || (self::$board[0][2] + self::$board[1][2] + self::$board[2][2] == self::$player * 3)
            || (self::$board[0][0] + self::$board[1][1] + self::$board[2][2] == self::$player * 3)
            || (self::$board[2][0] + self::$board[1][1] + self::$board[0][2] == self::$player * 3));
    }

    /**
     * putVal()- function to take input of row and columns during the play.
     */
    function putVal()
    {
        /**
         * @var $i [integer]
         * @var $j [integer]
         */
        $i;
        $j;
        if (self::$player == 0) {
            $i = rand(0, 2);
            $j = rand(0, 2);
        } else {
            $i = readline("Enter the row:\n");
            $j = readline("Enter the column:\n");
            while ($i > 2 || $j > 2) {
                echo "Enter correct values";
                $i = readline("Enter the row:\n");
                $j = readline("Enter the column:\n");
            }
        }
        if (self::$board[$i][$j] == -10) {
            if (self::$player == 0) {
                self::$board[$i][$j] = 0;
                echo "computer choosing " . $i . " " . $j . "\n";
            } else
                self::$board[$i][$j] = 1;
        } else
            TictactoeUtility::putVal();
    }


    /**
     * play()- function containing all the calling to othe fucntions
     */
    function play()
    {
        self::initBoard();
        self::dispBoard();
        while (self::$isempty) {
            echo "Players turn\n";
            self::putVal();
            self::dispBoard();
            if (self::win()) {
                echo "Player won\n";
                return;
            }
            self::$player = 0;
            echo "computers turn\n";
            self::putVal();
            self::dispBoard();
            if (self::win()) {
                echo "computer won\n";
                return;
            }
            self::$player = 1;
        }
        if (self::$isempty == false)
            echo "Draw";
    }
}
