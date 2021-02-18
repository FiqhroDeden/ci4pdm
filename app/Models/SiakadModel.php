<?php

namespace App\Models;

use CodeIgniter\Model;

class SiakadModel extends Model
{
    protected $table = 'siakad';
    protected $useTimestamps = true;
    protected $allowedFields = ['nim', 'nama_lengkap', 'nama_ibu', 'tempat_lahir', 'tanggal_lahir', 'periode_pendaftaran', 'jenis_kelamin'];

    public function search($keyword)
    {
        return $this->table('siakad')->like('nim', $keyword)->orLike('nama_lengkap', $keyword);
    }

    //     public function getsiakad()
    //     {
    //         $id = user_id();
    //         // $this->builder->select('*');
    //         // $this->builder->join('siakad', 'siakad.nim = users.username');
    //         // $query = $this->builder->get();

    //         // return $query;
    //         // return $this->where('nim', '150101037')
    //         //     ->findAll();

    //         // $this->builder->select('*');
    //         // $this->bulider->from('users');
    //     }
}
