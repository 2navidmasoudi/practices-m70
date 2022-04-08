<?php

class Redirect
{
    public static function to($location = null): void
    {
        header("location: $location");
    }
}
