<?php
$host = 'sql104.infinityfree.com';
$db   = 'if0_39324238_estoque';
$user = 'if0_39324238';
$pass = 'SilkTouch123321';
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
} catch (PDOException $e) {
    die(json_encode(['success' => false, 'message' => 'Erro de conexão: ' . $e->getMessage()]));
}
?>