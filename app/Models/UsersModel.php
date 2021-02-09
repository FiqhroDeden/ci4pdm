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
        $id = user_id();

        return $this->where('id', $id)
            ->findAll();
    }

    public function getedit($id)
    {
        return $this->find($id);
    }

    // public function getedit($id)
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //     $this->afterInsertdb->bind('id', $id);
    //     return $this->db->single();
    // }
    // public function getusers($id = false)
    // {

    //     if ($id == false) {
    //         $query =  $this->select('users.id as id, nim, fullname, no_hp, email, level, nama_fakultas')
    //             ->join('fakultas f', 'f.fakultas_id = users.hakfakultas')
    //             ->get();

    //         return $query->getResultArray();
    //     }


    //     return $this->where(['id' => $id])->first();
    // }
}
