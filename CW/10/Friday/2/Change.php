<?php

trait Change
{
    public function addDay(int $days): self
    {
        $this->timeStamp = strtotime("+$days days", $this->timeStamp);
        return $this;
    }
    public function subDay(int $days): self
    {
        $this->timeStamp = strtotime("-$days days", $this->timeStamp);
        return $this;
    }
    public function addMonth(int $month): self
    {
        $this->timeStamp = strtotime("+$month month", $this->timeStamp);
        return $this;
    }
    public function subMonth(int $month): self
    {
        $this->timeStamp = strtotime("-$month month", $this->timeStamp);
        return $this;
    }
    public function addYear(int $year): self
    {
        $this->timeStamp = strtotime("+$year year", $this->timeStamp);
        return $this;
    }
    public function subYear(int $year): self
    {
        $this->timeStamp = strtotime("-$year year", $this->timeStamp);
        return $this;
    }
}
