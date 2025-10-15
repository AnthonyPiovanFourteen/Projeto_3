<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductValidator
{
    /**
     * @param array{name?:string,price?:string|float|int} $input
     * @return array<string> Errors, empty if valid
     */
    public function validate(array $input): array;
}
