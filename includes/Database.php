<?php
class Database {
    private $host = "127.0.0.1";
    private $db_evento = "db_evento";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {

        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_evento, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>