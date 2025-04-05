<?php
include_once 'includes/Database.php';
include_once 'includes/Evento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento = new Evento(); 
    $evento->nome = $_POST['nome'];
    $evento->data_finalizacao = $_POST['data_finalizacao'];
    $evento->horario = $_POST['horario'];
    $evento->local = $_POST['local'];

    if ($evento->salvarEvento()) {
        echo "Evento cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar evento.";
    }
}

?>