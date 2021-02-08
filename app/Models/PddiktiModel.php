<?php

namespace App\Models;

use CodeIgniter\Model;

class PddiktiModel extends Model
{
    protected $table = 'pddikti';
    protected $useTimestamps = true;
    protected $allowedFields = ['nim', 'nama_lengkap'];

    public function search($keyword)
    {
        return $this->table('pddikti')->like('nim', $keyword)->orLike('nama_lengkap', $keyword);
    }
    // public function getpddikti()
    // {
    //     return $this->where('nim', '150101037')
    //         ->findAll();
    // }
}
