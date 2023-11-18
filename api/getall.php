<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'get'){

    // query sql de consulta
    $sql = $pdo->query("SELECT * FROM notes");

    // se o rowcount for maior que zero
    if($sql->rowCount() > 0){

        // busca todos os resultados em um array associativo e insere na variável data
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        // percorre o map $data e insere no array response
        foreach($data as $item){
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'body' => $item['body'],
            ];
        }
    }

} else {
    $array['error'] = 'Método não permitido (apenas GET)';
}

require('../return.php');