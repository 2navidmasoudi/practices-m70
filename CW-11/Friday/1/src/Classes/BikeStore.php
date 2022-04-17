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
        // search in present bikes in store
        foreach ($this->presentBikes as $key => $bike) {
            if (!$bike->getNeedsRepair()) {
                // if bike is ok! give to the person
                $this->borrowedBikes[] = $bike;
                unset($this->presentBikes[$key]);

                return $bike;
            }
            // if bike is broken repair it
            $this->provider->repair($bike);
        }
        // we have no (or ok) bike in store
        // we pick one from provider
        $bike = $this->provider->provide();
        $this->borrowedBikes[] = $bike;
        return $bike;
    }

    public function restore(Bike $bike, bool $needsRepair): void
    {
        // if ($needsRepair == true)
        //   $bike->setNeedsRepair(true);

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
