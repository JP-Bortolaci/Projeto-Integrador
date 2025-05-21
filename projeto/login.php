<?php
// login.php

$users = [
    'admin' => '1234',
    'user' => 'senha'
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Apenas para debug (remova em produção)
file_put_contents("log.txt", "Usuário: $username - Senha: $password\n", FILE_APPEND);

if (isset($users[$username]) && $users[$username] === $password) {
    echo 'success';
} else {
    echo 'error';
}
?>