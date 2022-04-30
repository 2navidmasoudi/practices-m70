<?php

class ClassItem
{
    private int $id;
    private string $name;
    private string $description;
    private int $duration;
    private array $days;

    public function __construct($id, $name, $description)
    {
        $this->setId($id);
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * 
     * @return int
     */
    function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * 
     * @param int $duration 
     * @return ClassItem
     */
    function setDuration($duration): self
    {
        if ($duration == 1 || $duration === 2)
            $this->duration = $duration;
        else
            echo "Duration must be 1 or 2";
        return $this;
    }
    /**
     * 
     * @return array
     */
    function getDays(): array
    {
        return $this->days;
    }

    /**
     * 
     * @param array $days 
     * @return ClassItem
     */
    function setDays(array $days): self
    {
        $this->days = $days;
        return $this;
    }
    /**
     * 
     * @return string
     */
    function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 
     * @param string $description 
     * @return ClassItem
     */
    function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    /**
     * 
     * @return string
     */
    function getName(): string
    {
        return $this->name;
    }

    /**
     * 
     * @param string $name 
     * @return ClassItem
     */
    function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
	/**
	 * 
	 * @param int $id 
	 * @return ClassItem
	 */
	private function setId(int $id): self {
        if ($id > 0)
		    $this->id = $id;
		return $this;
	}
}
