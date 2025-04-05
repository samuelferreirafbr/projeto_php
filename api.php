<?php
// Usando API com json

header("Content-Type: application/json");

include_once 'Cliente.php';

$method = $_SERVER['REQUEST_METHOD'];
$cliente = new Cliente();

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $cliente->getUserById($id);
            echo json_encode($user);
        } else {
            $cliente = new Cliente();
            $cliente->getAllUsers();
            echo json_encode($users);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $cliente = new Cliente();
        $cliente->createUser($data);
        echo json_encode($result);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id'])) {
            $id = intval($data['id']);
            $cliente = new Cliente();
            $cliente->updateUser($id, $data);
            echo json_encode($result);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $cliente = new Cliente();
            $cliente->deleteUser($id);
            echo json_encode($result);
        }
        break;

    default:
        echo json_encode(['message' => 'Método não suportado']);
        break;
}
?>