<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$products = $service->list();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos cadastrados</h1>
    <?php if (empty($products)): ?>
        <p>Nenhum produto cadastrado.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['id']) ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= htmlspecialchars($p['price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index.php">Cadastrar novo produto</a></p>
</body>
</html>
