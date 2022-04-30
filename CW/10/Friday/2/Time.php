<?php

interface getTime
{
    public function getTime(): self;
    public function getDate(): self;
    public function get(): self;
}

class Time implements getTime
{
    protected int $timeStamp;
    protected string $timeZone;

    public function __construct(int $timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    use Change;
    use Log;

    public function __call($name, $arguments)
    {
        self::log($this->name(), $name);
    }

    public function setTimeZone(string $timeZone): self
    {
        date_default_timezone_set($timeZone);
        return $this;
    }

    public function getDate(): self
    {
        self::log(date("Y/m/d", $this->timeStamp), __FUNCTION__);
        echo date("Y/m/d", $this->timeStamp);
        return $this;
    }

    public function getTime(): self
    {
        echo date("H:i:s", $this->timeStamp);
        return $this;
    }

    public function get(): self
    {
        echo date("Y/m/d H:i:s", $this->timeStamp);
        return $this;
    }

    public function __destruct()
    {
        self::log($this->timeStamp, __FUNCTION__);
    }
}

class Date extends Time implements getTime
{
    public function __construct(int|string $time)
    {
        $this->timeStamp = is_string($time) ? strtotime($time) : $time;
    }
}
