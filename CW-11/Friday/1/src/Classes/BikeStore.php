<?php

class BikeStore
{
    private Provider $provider;

    // array of Bike
    private array $presentBikes = [];

    private array $borrowedBikes = [];

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    public function borrow(): Bike
    {
        foreach ($this->presentBikes as $key => $bike) {
            if (!$bike->getNeedsRepair()) {
                $this->borrowedBikes[] = $bike;
                unset($this->presentBikes[$key]);
                return $bike;
            }
            $this->provider->repair($bike);
        }
        $bike = $this->provider->provide();
        $this->borrowedBikes[] = $bike;
        return $bike;
    }

    public function restore(Bike $bike, bool $needsRepair): void
    {
        $bike->setNeedsRepair($needsRepair);
        $key = array_search($bike, $this->borrowedBikes);
        if ($key === false)
            throw new Exception("Rabin Hood");

        $this->presentBikes[] = $bike;
        unset($this->borrowedBikes[$key]);
    }

    public function borrowedCount(): int
    {
        return count($this->borrowedBikes);
    }
}
