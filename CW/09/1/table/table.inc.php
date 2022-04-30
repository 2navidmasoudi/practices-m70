<?php

class Table
{
    private Row $header;
    private array $rows;
    public string $tableClasses = "";
    public string $cellClasses = "";
    public string $headerClasses = "";

    public function __construct(Row $header)
    {
        $this->header = $header;
    }

    /**
     * Get rows of Table
     * @return array $rows
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * Get header of Table
     * @return Row $header
     */
    function getHeader(): Row
    {
        return $this->header;
    }

    /**
     * add row to rows of Table
     * @param Row $row
     * @return Table
     */
    public function addRow(Row $row): Table
    {
        if ($row->count() === $this->header->count())
            $this->rows[] = $row;
        return $this;
    }

    /**
     * Swap 2 rows $a and $b of Table
     * @param int $a
     * @param int $b
     * @return Table
     */
    public function switchRows(int $a, int $b): Table
    {
        [$this->rows[$a], $this->rows[$b]]
             = [$this->rows[$b], $this->rows[$a]];
        return $this;
    }

    /**
     * Set cellClasses as string to Table
     * @param array $classes
     * @return Table
     */

    public function setCellClasses(array $classes): Table
    {
        $this->cellClasses = implode(" ", $classes);
        return $this;
    }

    /**
     * Set headerClasses as string to Table
     * @param array $classes
     * @return Table
     */
    public function setHeaderClasses(array $classes): Table
    {
        $this->headerClasses = implode(" ", $classes);
        return $this;
    }

    /**
     * Set tableClasses as string to Table
     * @param array $classes
     * @return Table
     */
    public function setTableClasses(array $classes): Table
    {
        $this->tableClasses = implode(" ", $classes);
        return $this;
    }


    /**
     * Returns html of Table
     * @return string
     */
    public function toHTML(): string
    {
        $table = "";
        $table .= "<table class='{$this->tableClasses}'>";

        // for header
        $table .= "<tr class='{$this->headerClasses}'>";
        foreach ($this->header->getValues() as $title) {
            $table .= "<td>";
            $table .= $title;
            $table .= "</td>";
        }
        $table .= "</tr>";

        // for Rows
        foreach ($this->rows as $row) {
            // cell of each row.
            $table .= "<tr>";
            foreach ($row->getValues() as $cell) {
                $table .= "<td class='{$this->cellClasses}'>";
                $table .= $cell;
                $table .= "</td>";
            }
            $table .= "</tr>";
        }

        $table .= "</table>";

        return $table;
    }
}
