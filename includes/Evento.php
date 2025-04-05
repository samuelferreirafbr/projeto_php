<?php
include_once 'Database.php';
class Evento {
    protected $conn;
    public $nome;
    public $data_finalizacao;
    public $horario;
    public $local;
    public $tipo_evento;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    public function salvarEvento() {

        if ($this->conn === null) {
            die("Erro: Conexão com o banco de dados não foi estabelecida.");
        }
        
        $query = "INSERT INTO evento SET nome=:nome, data_finalizacao=:data_finalizacao, horario=:horario, local=:local, tipo_evento=:tipo_evento";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_finalizacao", $this->data_finalizacao);
        $stmt->bindParam(":horario", $this->horario);        
        $stmt->bindParam(":local", $this->local);
        $stmt->bindParam(":tipo_evento", $this->tipo_evento);

        return $stmt->execute();
    }

    public function exibirEvento() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Data de Finalização: " . $this->data_finalizacao . "<br>";
        echo "Horário: " . $this->horario . "<br>";
        echo "Local: " . $this->local . "<br>";
        echo "Tipo de Evento: " . $this->tipo_evento . "<br>";
    }
}
