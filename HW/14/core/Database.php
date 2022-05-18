<?php

namespace app\core;

use PDO;

class Database extends MySqlDatabase
{
    private static $instance = null;
    private static array $config = [];

    public PDO $pdo;
    private function __construct()
    {
        $dsn = self::$config['dsn'];
        $user = self::$config['user'];
        $password = self::$config['password'];
        $this->pdo = new PDO($dsn, $user, $password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }

    public static function getInstance(array $config)
    {
        if (!isset(self::$instance)) {
            self::$config = $config;
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function applyMigrations()
    {
        $this->createMigrationTable();
        $apliedMigration = $this->getAppliedMigrations();
        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . "/migrations");
        $toApplyMigrations = array_diff($files, $apliedMigration);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === "." || $migration === "..") {
                continue;
            }

            require_once Application::$ROOT_DIR . "/migrations/$migration";
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className;

            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied");
        }
    }

    public function createMigrationTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(',', array_map(fn ($m) => "('$m')", $migrations));
        $query = "INSERT INTO migrations (migration) VALUES $str";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}
