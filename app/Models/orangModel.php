<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'no_hp', 'username', 'fullname', 'nim', 'hakfakultas', 'level', 'password_hash', 'active'];

    public function getusers()
    {
        return $this->findAll();
    }
}
