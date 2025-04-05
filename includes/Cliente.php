<?php
include_once 'Database.php';

class Cliente {
    
    protected $conn;
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $foto;
    public $data_nascimento;
    public $genero;
    public $is_admin = 0;

    // CRUD
    public function getUserById($id) {
    }

    public function getAllUsers() {
    }

    public function createUser($data) {
    }

    public function updateUser($id, $data) {
    }

    public function deleteUser($id) {
    }

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function salvar() {

        if ($this->conn === null) {
            die("Erro: Conexão com o banco de dados não foi estabelecida.");
        }
        
        $query = "INSERT INTO cliente SET id=:id, nome=:nome, email=:email, senha=:senha, foto=:foto, data_nascimento=:data_nascimento, genero=:genero, is_admin=:is_admin";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        
        $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt->bindValue(":senha", $senhaHash);        
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":is_admin", $this->is_admin);
        $stmt->bindParam(":genero", $this->genero);

        return $stmt->execute();
    }

    public function login($email, $senha) {

        $query = "SELECT * FROM cliente WHERE email=:email";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);
        
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senha, $row['senha'])) {
                session_start();
                $_SESSION['cliente'] = $row['id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                return true;

            } else {
                return false;
            }
        }  else {
                return false; }
        
    }

    public function getPainel() {
        return "<h3>Painel do Cliente</h3><p>Bem-vindo, {$this->nome}!</p>";
    }
}
?>