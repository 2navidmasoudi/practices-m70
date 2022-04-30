<?php

final class Student extends Person
{

    private array $classes = [];

    /**
     * return array of classes
     *
     * @return array
     */
    public function classList(): array
    {
        return $this->classes;
    }

    /**
     * add $classItem to list student class, if not exist
     *
     * @param ClassItem $classItem
     * @return $this
     */
    public function addClass(ClassItem $classItem): Student
    {
        // If class already exist, don't add it...
        if (!$this->isStudentHasClass($classItem))
            $this->classes[] = $classItem;
        else
            "Class already exist.";
        return $this;
    }

    /**
     * return true if student has this class else return false
     *
     * @param ClassItem $classItem
     * @return bool
     */
    public function isStudentHasClass(ClassItem $classItem): bool
    {
        $find = array_search($classItem, $this->classes);
        return $find !== false;

        // return in_array($classItem, $this->classes);
    }

    /**
     * @param ClassItem $classItem
     * @return string
     */
    public function removeClass(ClassItem $classItem)
    {
        $find = array_search($classItem, $this->classes);
        if ($find !== false) {
            unset($this->classes[$find]);
            $this->classes = array_values($this->classes);
            return "Class has been removed.";
        }
        return "Unable to find the class";
    }
}
