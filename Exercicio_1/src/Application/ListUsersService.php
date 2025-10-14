<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\UserRepository;

class ListUsersService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array<array{name:string,email:string}>
     */
    public function getAllUsers(): array
    {
        $users = $this->repository->findAll();
        
        return array_map(function ($user) {
            return [
                'name' => $user['name'],
                'email' => $user['email']
            ];
        }, $users);
    }
}
