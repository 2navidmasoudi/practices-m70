<?php


class TimeStamp
{
    private int $time;
    private $timeZone;
    // private DateTime $date;

    public function __construct(int $time)
    {
        $this->time = $time;
        // $date = new DateTime();
        // $date->setTimestamp($time);
    }

    public function setTimeZone(string $timeZone)
    {
        date_default_timezone_set($timeZone);
        return $this;
    }

    public function getDate()
    {
        return date("Y/m/d", $this->time);
    }

    public function getClock()
    {
        return date("H:i:s", $this->time);
    }

    public function getFull()
    {
        return date("Y/m/d H:i:s", $this->time);
    }
}
