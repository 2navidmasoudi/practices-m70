<?php

class Row
{
    private array $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function count()
    {
        return count($this->values);
    }

    public function getValues()
    {
        return $this->values;
    }
}

class Table
{
    private array $rows;
    private Row $header;
    private string $tableClasses = "";
    private string $cellClasses = "";
    private string $headerClasses = "";

    public function __construct(Row $header)
    {
        $this->header = $header;
    }

    public function addRow(Row $row): Table
    {
        if ($row->count() === $this->header->count())
            $this->rows[] = $row;
        return $this;
    }

    public function switchRows(int $a, int $b): Table
    {
        [$this->rows[$a], $this->rows[$b]]
            = [$this->rows[$b], $this->rows[$a]];
        return $this;
    }

    public function setCellClasses(array $classes): Table
    {
        $this->cellClasses = implode(" ", $classes);
        return $this;
    }

    public function setHeaderClasses(array $classes): Table
    {
        $this->headerClasses = implode(" ", $classes);
        return $this;
    }

    public function setTableClasses(array $classes): Table
    {
        $this->tableClasses = implode(" ", $classes);
        return $this;
    }

    public function toHTML(): string
    {
        $table  = "";
        $table .= "<table class='$this->tableClasses'>";

        // for header
        $table .= "<tr class='$this->headerClasses'>";
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
                $table .= "<td class='$this->cellClasses'>";
                $table .= $cell;
                $table .= "</td>";
            }
            $table .= "</tr>";
        }

        $table .= "</table>";

        return $table;
    }
}
