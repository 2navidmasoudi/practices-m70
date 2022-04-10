<?php

class CSVReader implements Reader
{
    private array $data;




    public function read(string $path)
    {
        $data = [];

        // if (($open = fopen(__DIR__ . "/people.csv", "r")) !== FALSE) {
        //     while (($data = fgetcsv($open, 0, ",")) !== FALSE) {
        //         $array[] = $data;
        //     }
        //     fclose($open);
        // }

        $csvFile = file($path);
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }

        $key = $data[0];
        unset($data[0]);
        $newData = [];

        foreach ($data as $row) {
            $newData[] = (object) array_combine($key, $row);
        }

        $this->data = $newData;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
