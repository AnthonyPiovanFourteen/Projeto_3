<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRP Demo</title>
</head>
<body>
    <h1>Cadastro de produtos</h1>
    <form action="create.php" method="POST">
        <label>Nome do Produto: <input name="name" required></label>
        <label>Preço do Produto: <input name="price" type="number" min="0" step="0.01" required></label>
        <button type="submit">Cadastrar</button>
        <p><a href="products.php">Listar produtos cadastrados</a></p>
    </form>
</body>
</html>
