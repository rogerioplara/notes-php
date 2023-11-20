<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'delete') {

    // recepção dos dados que não são get nem post
    parse_str(file_get_contents('php://input'), $input);

    // nullcao
    $id = $input['id'] ?? null;

    // filtrar as variáveis
    $id = filter_var($id);

    if ($id) {
        // execução da query
        $sql = $pdo->prepare("DELETE FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
} else {
    // Tratamento de erro para método diferente do permitido
    $array['error'] = 'Método não permitido (apenas DELETE)';
}

require('../return.php');
