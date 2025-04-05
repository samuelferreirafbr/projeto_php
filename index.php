<?php
session_start();
if (isset($_SESSION['cliente'])) { 
    header("Location: painel.php"); 
    exit;
}

include_once 'includes/Cliente.php';

$dbHost = 'localhost';
$dbName = 'db_evento';
$dbUser = 'root'; 
$dbPass = '';

try { $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $loginSuccess = $cliente->login($_POST['email'], $_POST['senha']);

    if ($loginSuccess) { 
        header("Location: painel.php");
        exit; 
    } else {
        echo "As credenciais são inválidas!";
    }
}

// Usando API com json

$json = file_get_contents('http://localhost/projeto_php/api.php');

$tarefas = json_decode($json, true);

require 'smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');

$smarty->assign('tarefas', $tarefas);

$smarty->display('login.tpl');

?>
