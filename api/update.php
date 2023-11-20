<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'put') {

    // recepção dos dados que não são get nem post
    parse_str(file_get_contents('php://input'), $input);

    // nullcao
    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    // filtrar as variáveis
    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if ($id && $title && $body) {

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            // execução da query
            $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            // retorno da atualização
            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body,
            ];
        } else {
            $array['error'] = 'ID inexistente';
        }
    } else {
        $array['error'] = 'Dados não enviados';
    }
} else {
    // Tratamento de erro para método diferente do permitido
    $array['error'] = 'Método não permitido (apenas PUT)';
}

require('../return.php');
