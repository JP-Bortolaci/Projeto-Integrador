<?php
$host = 'localhost';
$db   = 'estoque';
$user = 'root';
$pass = ''; // senha do seu xampp
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
} catch (PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}
