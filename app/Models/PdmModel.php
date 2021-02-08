<?php

namespace App\Models;

use CodeIgniter\Model;

class PdmModel extends Model
{
    protected $table = 'datapdm';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pengirim', 'nama_lengkap', 'nim', 'nomor', 'fakultas', 'prodi', 'lokasi_data', 'data', 'akte', 'ktm', 'ijasah', 'surat', 'status', 'keterangan'];

    public function getPdm($id = false)
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

    public function getPdm_byUsers()
    {
        $id = user_id();

        return $this->where('id_pengirim', $id)
            ->findAll();
    }
}
