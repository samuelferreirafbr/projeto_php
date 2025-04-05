
<?php
include_once 'includes/Evento.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? null;
    $data_finalizacao = $_POST['data_finalizacao'] ?? null;
    $horario = $_POST['horario'] ?? null;
    $local = $_POST['local'];
    $tipo_evento = $_POST['tipo_evento'] ?? null;


    // Serve para verificar se os dados foram recebidos via POST, foi necessário pois o código não rodava sem ele

    if ($nome && $data_finalizacao && $horario && $local && $tipo_evento) {
        $conn = new mysqli('localhost', 'root', '', 'db_evento');
        if ($conn->connect_error) { die("Falha na conexão: " . $conn->connect_error); 
        
        }$stmt = $conn->prepare("INSERT INTO evento (nome, data_finalizacao, horario, local, tipo_evento) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $nome, $data_finalizacao, $horario, $local, $tipo_evento); 

        if ($stmt->execute()) { $mensagem = "Evento cadastrado com sucesso!";

        } else { $mensagem = "Erro ao salvar o evento: " . $stmt->error;
            
        } $stmt->close(); $conn->close();
    } else { $mensagem = "Preencha todos os campos do formulário.";

    } } else { $mensagem = "Método não permitido."; }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
</head>
<body>
    <div>
        <h2><?php echo $mensagem; ?></h2>
        <a href="cadastroEvento.html">Voltar para o cadastro</a>
    </div>
</body>
</html>