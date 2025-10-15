<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$response = $service->create($_POST);

$httpCode = $response ? 201 : 422;
http_response_code($httpCode);

echo $response ? 'Produto cadastrado com sucesso' : 'Falha no cadastro';

