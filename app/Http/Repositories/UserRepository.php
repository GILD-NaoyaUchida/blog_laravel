<?php
namespace App\Http\Repositories;

use App\Http\Models\User;

class UserRepository
{
    public function getById(int $id) {
        return User::find($id);
    }
}
