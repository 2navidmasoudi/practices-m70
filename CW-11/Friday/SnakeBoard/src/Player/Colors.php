<?php

namespace Player;
// from http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
class Colors
{
    private static $colors = [
        'black' => '1;30',
        'blue' => '1;34',
        'green' => '1;32',
        'cyan' => '1;36',
        'red' => '1;31',
        'purple' => '1;35',
        'yellow' => '1;33',
        'white' => '97',
    ];

    // Returns colored string
    public static function putColor($color = 'white')
    {
        return "\e[" . self::$colors[$color] . "m";
    }
}
