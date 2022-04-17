<?php

class Terminal
{
    static function clear()
    {
        if (PHP_OS == "Windows") {
            system('cls');
        } else {
            // print(exec('clear'));
            system('cls');
        }
    }

    static function realtime()
    {
        if (PHP_OS == "Windows") {
            system('cls');
        } else {
            // print(exec('clear'));
            system('cls');
        }
    }
}
