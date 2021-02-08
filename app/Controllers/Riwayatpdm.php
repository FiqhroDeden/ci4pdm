<?php

namespace App\Controllers;

use App\Models\PdmModel;

class Riwayatpdm extends BaseController
{
    public function __construct()
    {
        $this->PdmModel = new PdmModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Riwayat Pengajuan',
            'datapdm' => $this->PdmModel->getPdm_byUsers()

        ];

        return view('riwayatpdm/index', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengajuan',
            'datapdm' => $this->PdmModel->getPdm($id)
        ];
        if (empty($data['datapdm'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengajuan ' . $id . ' tidak ditemukan.');
        }
        return view('riwayatpdm/detail', $data);
    }


    //--------------------------------------------------------------------

}
