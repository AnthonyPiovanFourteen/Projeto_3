<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array{name?:string,price?:string|float|int} $input
     */
    public function create(array $input): bool
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return false;
        }

        $product = [
            'id' => $this->repository->nextId(),
            'name' => (string)$input['name'],
            'price' => (float)$input['price'],
        ];
        $this->repository->save($product);
        return true;
    }

    /**
     * @return array<array{id:int,name:string,price:float}>
     */
    public function list(): array
    {
        return $this->repository->findAll();
    }
}
