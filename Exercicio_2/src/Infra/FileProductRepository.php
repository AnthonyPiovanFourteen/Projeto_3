<?php

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $dir = dirname($filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if (!file_exists($filePath)) {
            touch($filePath);
        }
    }

    public function save(array $product): void
    {
        file_put_contents(
            $this->filePath,
            json_encode($product, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );
    }

    public function findAll(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $lines = array_filter(explode(PHP_EOL, trim(file_get_contents($this->filePath))));
        $products = [];
        foreach ($lines as $line) {
            $product = json_decode($line, true);
            if ($product !== null) {
                $products[] = $product;
            }
        }
        return $products;
    }

    public function nextId(): int
    {
        $lastId = 0;
        foreach ($this->findAll() as $product) {
            if (isset($product['id'])) {
                $lastId = max($lastId, (int)$product['id']);
            }
        }
        return $lastId + 1;
    }
}
