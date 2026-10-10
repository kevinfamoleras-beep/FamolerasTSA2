<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'username',
        'full_name',
        'email',
        'created_at',
        'password'
    ];

    public function getDemoUser()
    {
        return $this->builder()
            ->orderBy('id', 'ASC')
            ->get(1)
            ->getRowArray();
    }

    public function findByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
}
