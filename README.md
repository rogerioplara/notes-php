# API notesPHP

### O que o projeto precisa fazer?
- Listar as anotações
- Visualizar uma anotação
- Inserir uma nova anotação
- Atualizar uma anotação
- Deletar uma anotação

### Qual a estrutura de dados?
- Persistencia dos dados:
-- id
-- title
-- body

### Quais os endpoits?
  (METODO)  /url             (PARÂMETROS)   
- (GET)     /api/notes                     | /api/getall.php
- (GET)     /api/note/{id}                 | /api/get.php?id={id}
- (POST)    /api/note        (title, body) | /api/insert.php (title, body)
- (PUT)     /api/note{id}    (title, body) | /api/update.php (id, title,body)
- (DELETE)  /api/note{id}                  | /api/delete.php (id)

Requisição
- Igual o acesso a um site normal
- GET, POST, PUT, DELETE, OPTIONS...
- Cabeçalhos

Retorno
- Texto puro
- XML
- JSON



