<?php

declare(strict_types=1);

namespace App\Domain;

use App\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    public function validate(array $input): array
    {
        $errors = [];

        $name = trim($input['name'] ?? '');
        $price = $input['price'] ?? '';

        if ($name === '' || strlen($name) < 2 || strlen($name) > 100) {
            $errors[] = '!!Nome do produto precisa ter entre 2 e 100 caracteres!!';
        }

        if (!is_numeric($price) || (float)$price < 0) {
            $errors[] = '!!Preço não pode ser um número negativo!!';
        }

        return $errors;
    }
}
