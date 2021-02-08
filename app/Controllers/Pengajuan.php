<?php

namespace App\Controllers;

use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{
    public function __construct()
    {
        $this->PdmModel = new PengajuanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Pengajuan PDM',
            'datapdm' => $this->PdmModel->getPdm()
        ];


        return view('pengajuan/index', $data);
    }
    public function detail($id)
    {
        $pdm = $this->PdmModel->getPdm($id);
        $data = [
            'title' => 'Detail Pengajuan',
            'datapdm' => $this->PdmModel->getPdm($id)
        ];

        //jika pdm tidak ada di tabel
        if (empty($data['datapdm'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengajuan ' . $id . ' tidak ditemukan.');
        }
        return view('pengajuan/detail', $data);
    }

    public function setstatus($id)
    {
        $data = [
            'id' => $id,
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $this->PdmModel->update($id, $data);
        session()->setFlashdata('pesan', 'Status Berhasil Diubah.');
        return redirect()->to('/pengajuan');
    }

    public function delete($id)
    {
        $this->PdmModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/pengajuan');
    }


    //--------------------------------------------------------------------

}
