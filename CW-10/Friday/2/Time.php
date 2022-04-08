<?php

interface getTime
{
    public function getTime(): self;
    public function getDate(): self;
    public function get(): self;
}

class Time
{
    protected int $timeStamp;
    protected $timeZone;

    public function __construct(int $timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    use Change;

    public function setTimeZone(string $timeZone): self
    {
        date_default_timezone_set($timeZone);
        return $this;
    }

    public function getDate(): self
    {
        Log::log(date("Y/m/d", $this->timeStamp), __FUNCTION__);
        return $this;
    }

    public function getTime(): self
    {
        Log::log(date("H:i:s", $this->timeStamp), __FUNCTION__);
        return $this;
    }

    public function get(): self
    {
        Log::log(date("Y/m/d H:i:s", $this->timeStamp), __FUNCTION__);
        return $this;
    }
}

class Date extends Time
{
    public function __construct(int|string $time)
    {
        $this->timeStamp = is_string($time) ? strtotime($time) : $time;
    }
}
