<?php
// login.php

// Simulação de dados de usuários
$users = [
    'admin' => '1234',
    'user' => 'senha'
];

// Obtém os dados do POST
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Verifica se as credenciais são válidas
if (isset($users[$username]) && $users[$password] === $password) {
    echo 'success';
} else {
    echo 'error';
}
?>