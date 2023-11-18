<?php

// Permissão de outros sites a requisitarem nossa api - é possível definir domínios específicos no lugar do asterisco
header("Access-Control-Allow-Origin: *");

// Permitir os métodos de requisição
header("Access-Control-Allow-Methos: GET, POST, PUT, DELETE, OPTIONS");

// Definir o tipo de response
header("Content-Type: application/json");

echo json_encode($array);
exit;