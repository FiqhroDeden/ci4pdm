<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table = 'datapdm';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pengirim', 'nama_lengkap', 'nim', 'nomor', 'fakultas', 'prodi', 'lokasi_data', 'data', 'akte', 'ktm', 'ijasah', 'surat', 'status'];

    public function pdm($id = false)
    {
        return $this->findAll();
    }

    public function getPdm($id = false)
    {

        if ($id == false) {

            if (in_groups('admin')) {
                return $this->orderBy('id', 'DESC')->findAll();
            }
            $user = user_id();
            if (in_groups('operator')) {
                // $fakultas = $this->db->table('fakultas')
                //     ->join('hakpdm', 'hakpdm.id_fakultas = fakultas.fakultas_id')
                //     ->where('user_id', $user)
                //     ->get();

                // foreach ($fakultas->getResultArray() as $namafakultas) :
                //     if ($namafakultas == null) {
                //     }
                //     $query = $this->db->table('fakultas')
                //         ->getWhere(['nama_fakultas' => $namafakultas['nama_fakultas']]);

                //     foreach ($query->getResultArray() as $f) :
                //         return $this->where('fakultas', $f['nama_fakultas'])
                //             ->orderBy('id', 'DESC')
                //             ->findAll();
                //     endforeach;
                // endforeach;

                return $this->select('*')
                    ->join('users u', 'u.hakfakultas = datapdm.');
            }



            // if (has_permission('3')) {
            //     return $this->where('fakultas', 'Teknik')->orderBy('id', 'DESC')->findAll();
            // } elseif (has_permission('9')) {
            //     return $this->where('fakultas', 'Kedokteran')->orderBy('id', 'DESC')->findAll();
            // }
        }


        return $this->where(['id' => $id])->first();
    }
}
