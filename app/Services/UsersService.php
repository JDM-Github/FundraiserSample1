<?php

namespace App\Services;

use App\Repositories\UsersRepository;

class UsersService
{
    protected $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function register(array $data)
    {
        $user = $this->usersRepository->create($data);
        $user->assignRole($data['role']);
        return $user;
    }
}
