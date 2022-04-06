<?php

final class Student extends Person
{

    private array $classes;

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
        $this->classes[] = $classItem;
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
        if ($find !== false) return true;
        return false;
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
