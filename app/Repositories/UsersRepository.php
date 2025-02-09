<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function getAll()
    {
        return User::all();
    }
}
