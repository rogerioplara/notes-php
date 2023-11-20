<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'get') {
    // Recebe o parâmetro passado pela url, filtra e armazena na variável $id
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {

        // Query preparada pra quando é passado algum valor
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        // Verifica se retornou algo
        if ($sql->rowCount() > 0) {

            // Se retirnou, busca o resultado como array associativo e armazena em $data
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            // Alimenta o array de response
            $array['result'] = [
                'id' => $data['id'],
                'title' => $data['title'],
                'body' => $data['body'],
            ];
        } else {
            // Tratamento de erro para id inexistente
            $array['error'] = 'ID inexistente';
        }
    } else {
        // Tratamento de erro para id não enviado no parâmetro
        $array['error'] = 'ID não enviado';
    }
} else {
    // Tratamento de erro para método diferente do permitido
    $array['error'] = 'Método não permitido (apenas GET)';
}

require('../return.php');
