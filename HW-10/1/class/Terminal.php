<?php

// This file was for making UI for game...
// Unfortunately it's so hard! 😢
class Terminal
{
    // BOX DRAWING

    // TERMINAL WIDTH AND HEIGHT
    public static $width;
    public static $height;

    // CLEARS THE TERMINAL
    static function clear()
    {
        // PHP_OS == "Windows" ? system('cls') : system('clear');
        DIRECTORY_SEPARATOR === '\\' ? system('cls') : system('clear');
    }

    static function realtime($userInput = false)
    {
        system("stty cbreak -echo");
    }

    // GET AND SET THE SIZE OF TERMINAL
    static function getSize()
    {
        self::$width = exec('tput cols');
        self::$height = exec('tput lines');
    }

    static function drawBox(string ...$args)
    {
        $tl = html_entity_decode('╔', ENT_NOQUOTES, 'UTF-8'); // top left corner
        $tr = html_entity_decode('╗', ENT_NOQUOTES, 'UTF-8'); // top right corner
        $bl = html_entity_decode('╚', ENT_NOQUOTES, 'UTF-8'); // bottom left corner
        $br = html_entity_decode('╝', ENT_NOQUOTES, 'UTF-8'); // bottom right corner
        $v  = html_entity_decode('║', ENT_NOQUOTES, 'UTF-8');  // vertical wall
        $h  = html_entity_decode('═', ENT_NOQUOTES, 'UTF-8');  // horizontal wall
        echo $tl
            . str_repeat($h, self::$width - 2)
            . $tr
            . PHP_EOL;

        echo str_repeat(
            $v
                . str_repeat(" ", self::$width - 2)
                . $v
                . PHP_EOL,
            self::$height - 3
        );

        echo $bl
            . str_repeat($h, self::$width - 2)
            . $br
            . PHP_EOL;
    }

    public static function showWelcome()
    {
        echo "Welcome to Car Game" . PHP_EOL;
        echo "Enter your Name: ";
    }
}
