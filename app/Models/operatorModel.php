<?php

namespace App\Models;

use CodeIgniter\Model;

class operatorModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'username', 'nama_lengkap', 'nip', 'jabatan', 'golongan', 'no_telp', 'level', 'password_hash', 'active'];

    public function getPegawai($id = false)
    {

        if ($id == false) {
            $query =  $this->select('users.id as id, nip, nama_lengkap, no_telp, email, nama_golongan, kode_golongan, nama_jabatan, name')
                ->join('golongan g', 'g.id = users.golongan')
                ->join('jabatan j', 'j.id = users.jabatan')
                ->join('auth_groups ag', 'ag.id = users.level')
                ->get();

            return $query->getResultArray();
        }


        return $this->where(['id' => $id])->first();
    }
}
