<?php
$db_host = 'localhost';
$db_name = 'devsnotes';
$db_pass = '';
$db_user = 'root';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

// Estrutura padrão de resposta
$array = [
    'error' => '',
    'result' => [],
];

