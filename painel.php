<?php
session_start();

if (!isset($_SESSION['cliente'])) {
    header("Location: index.php");
    exit;
}

include_once 'includes/Cliente.php';
include_once 'includes/Admin.php';

if ($_SESSION['is_admin'] == 1) {
    $cliente = new Admin();
} else {
    $cliente = new Cliente();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
echo $cliente->getPainel();

if ($cliente instanceof Admin) {
    $clientes = $cliente->listarClientes();
?>


    <h3>Lista de Clientes:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Foto</th>
        </tr>

        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?php echo $u['id']; ?></td>
            <td><?php echo $u['nome']; ?></td>
            <td><?php echo $u['email']; ?></td>
            <td><?php echo $u['data_nascimento']; ?></td>
            <td>
                <?php if ($u['foto']): ?>
                    <img src="uploads/<?php echo $u['Foto']; ?>" alt="Foto de Perfil" width="50">
                <?php else: ?>
                    Sem Foto
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>
    <a href="upload.php">Alterar Foto de Perfil</a>
    <a href="logout.php">Sair</a>
</body>
</html>
