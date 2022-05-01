<?php


// trait Formatter
// {

//     protected function format(array $targets, string $prefix = '', string $starter = '', string $finisher = '', string $separator = ', ', string $side = '')
//     {
//         $string = $starter;

//         foreach ($targets as $target) {

//             $string .= $prefix . $side . $target . $side . $separator;
//         }

//         return preg_replace("/{$separator}$/", $finisher, $string);
//     }

//     protected function formatEquation($targets)
//     {
//         $string = '';

//         foreach ($targets as $target)
//             $string .= "`$target`=:$target,";

//         return substr($string, 0, strlen($string) - 1);
//     }

//     public function formatSize(int $size)
//     {

//         if ($size > 1000 * 1000)
//             return ((int)(($size / (1000 * 1000)) * 100)) / 100 . ' MB';
//         else if ($size > 1000)
//             return ((int)(($size / 1000) * 100)) / 100 . ' KB';
//         else
//             return $size . ' B';
//     }
// }

// class MySqlDatabaseConnection
// {
//     public function getConnection()
//     {
//     }
// }

// class MySqlDatabase
// {
//     use Formatter;
//     private \PDO $db;

//     protected string $tableName;
//     protected string $query = '';
//     protected string $condition = '';
//     protected array $data = [];
//     private \PDOStatement $statement;

//     public function __construct(MySqlDatabaseConnection $connection)
//     {
//         $this->db = $connection->getConnection();
//         // $this->db = new PDO('mysql:host=127.0.0.1;port=3326;dbname=maktab_peygir', 'mohammad', '12345678');
//     }

//     public function table(string $table)
//     {
//         $this->tableName = $table;
//         return $this;
//     }

//     public function select($targets = ['*'])
//     {
//         $columns = is_array($targets) ? $this->format($targets) : $targets;
//         $this->query = "SELECT {$columns} FROM {$this->tableName} ";

//         return $this;
//     }

//     private function prepare()
//     {
//         $this->statement = $this->db->prepare($this->query . $this->condition . ';');
//     }

//     public function execute()
//     {
//         $this->prepare();
//         $this->statement->execute($this->data);
//     }

//     public function fetch()
//     {
//         $this->execute();
//         return $this->statement->fetch(\PDO::FETCH_ASSOC);
//     }

//     public function fetchAll()
//     {
//         $this->execute();
//         return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
//     }
// }

// $db = new MySqlDatabase();
// $r = $db->table('fields')->select()->fetchAll();
// var_dump($r);
