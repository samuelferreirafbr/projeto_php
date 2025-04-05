<?php
session_start();
if (!isset($_SESSION['cliente'])) { 
    header("Location: index.php");
    exit;
}

include_once 'includes/Cliente.php';

$cliente = new Cliente();
$cliente->id = $_SESSION['cliente'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES['foto']['name']); 
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
        $cliente->foto = $fileName; 
        echo "A foto foi enviada com sucesso.";
    } else {
        echo "Erro ao tentar enviar a foto.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de Foto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Envio da Foto de Perfil</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="foto" required>
        <button type="submit">Enviar Foto</button>
    </form>
</body>
</html>