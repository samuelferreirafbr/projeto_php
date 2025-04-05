<?php
include_once 'includes/Database.php';
include_once 'includes/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente(); 
    $cliente->nome = $_POST['nome'];
    $cliente->email = $_POST['email'];
    $cliente->senha = $_POST['senha'];
    $cliente->data_nascimento = $_POST['data_nascimento'];
    $cliente->is_admin = isset($_POST['is_admin']) ? 1 : 0;
    $cliente->genero = $_POST['genero'];

    if (!empty($_FILES['foto']['name'])) { 
        $targetDir = "uploads/";
        $fileName = basename($_FILES['foto']['name']);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
            $cliente->foto = $fileName;
        } else {
            echo "Erro ao fazer upload da foto.";
            exit;
        }
    }

    if ($cliente->salvar()) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente.";
    }
}
?>