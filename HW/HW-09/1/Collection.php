<?php

class Collection
{
    protected $list;
    protected SortingStrategy $sort;
    public function __construct(SortingStrategy $sort)
    {
        $this->sort = $sort;
    }
    public function addItem($item)
    {
        $this->list[] = $item;
    }
    public function getAll()
    {
        return $this->sort->getSortedSet($this->list);
    }
}
