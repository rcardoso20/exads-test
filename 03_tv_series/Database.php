<?php

class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    public $pdo;

    public function __construct($host = 'localhost', $dbname = 'tv1', $username = 'root', $password = 'root') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    public function connect(): void {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function closeConnection(): void {
        $this->pdo = null;
    }

    public function query($sql): array {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
