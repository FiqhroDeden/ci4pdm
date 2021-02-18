<?php

namespace App\Models;

use CodeIgniter\Model;

class PddiktiModel extends Model
{
    protected $table = 'pddikti';
    protected $useTimestamps = true;
    protected $allowedFields = ['nim', 'nama_lengkap', 'nama_ibu', 'tempat_lahir', 'tanggal_lahir', 'periode_pendaftaran', 'jenis_kelamin'];

    public function search($keyword)
    {
        return $this->table('pddikti')->like('nim', $keyword)->orLike('nama_lengkap', $keyword);
    }
    public function getPddikti($id = false)
    {

        if ($id == false) {
            // return $this->db->table('datapdm')

            //     ->join('fakultas', 'fakultas.fakultas_id=datapdm.fakultas')
            //     ->join('prodi', 'prodi.prodi_id=datapdm.prodi')
            //     ->get()->getResultArray();
            return $this->findAll();
        }


        return $this->where(['id' => $id])->first();
    }
}
