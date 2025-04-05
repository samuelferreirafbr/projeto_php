<?php
include_once 'Cliente.php';

class Admin extends Cliente {

    public function getPainel() {
        return "<h3>Painel do Administrador</h3><p>Olá! Aqui você pode gerenciar todos os clientes.</p>";
    }

    public function listarClientes() {
        $query = "SELECT id, nome, email, data_nascimento, foto FROM cliente";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>