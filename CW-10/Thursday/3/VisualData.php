<?php

class VisualData
{
    private array $data;
    public function __construct(Reader $reader)
    {
        $this->data = $reader->getData();
    }

    public function add(object $row)
    {
        $this->data[] = $row;
    }

    // remove by index by defualt
    // otherwise remove by $key => $needle
    public function remove($needle, string $key = "index")
    {
        if ($key != "index") {
            $find = array_search($needle, array_column($this->data, $key));
            if ($find !== false) {
                unset($this->data[$find]);
            }
        } elseif (is_int($needle)) {
            unset($this->data[$needle]);
        }
        $this->data = array_values($this->data);
    }

    public function exportToArray()
    {
        return json_decode(json_encode($this->data), true);
    }

    public function exportToTable()
    {
        $table = "";
        $table .= "<table>";

        // for header
        $table .= "<tr>";
        foreach ((array) $this->data[0] as $title => $value) {
            $table .= "<th>$title</th>";
        }
        $table .= "</tr>";

        // for Rows
        foreach ($this->data as $row) {
            // cell of each row.
            $table .= "<tr>";
            foreach ((array)$row as $cell) {
                $table .= "<td>$cell</td>";
            }
            $table .= "</tr>";
        }

        $table .= "</table>";

        return $table;
    }

    public function sort(string $key)
    {
        usort($this->data, fn ($a, $b) => $a->$key >= $b->$key);
    }

    public function capitalize($needle, $key = "index")
    {
        if ($key != "index") {
            $find = array_search($needle, array_column($this->data, $key));
            if ($find !== false) {
                $temp = (array) $this->data[$find];
                $temp = array_map('strtoupper', $temp);
                $this->data[$find] = (object) $temp;
            }
        } elseif (is_int($needle)) {
            $temp = (array) $this->data[$needle];
            $temp = array_map('strtoupper', $temp);
            $this->data[$needle] = (object) $temp;
        }
    }
}
