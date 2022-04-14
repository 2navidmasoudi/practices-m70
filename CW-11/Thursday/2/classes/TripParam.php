<?php

class TripParam
{
    private int $start;
    private int $end;
    private bool $isRainy;
    private bool $isTrafic;

    public function __construct(
        int $start,
        int $end,
        bool $isRainy,
        bool $isTrafic,
    ) {
        $this->start = $start;
        $this->end = $end;
        $this->isRainy = $isRainy;
        $this->isTrafic = $isTrafic;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }
    public function isRainy()
    {
        return $this->isRainy;
    }
    public function isTrafic()
    {
        return $this->isTrafic;
    }
}
