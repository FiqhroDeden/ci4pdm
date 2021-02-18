<?php

namespace App\Controllers;

use App\Models\SiakadModel;

class Siakad extends BaseController
{
    public function __construct()
    {
        $this->SiakadModel = new SiakadModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Data Siakad',
                'siakad' => $this->SiakadModel->findAll()
            ];
        return view('siakad/index', $data);
    }

    public  function save()
    {
        $this->SiakadModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'periode_pendaftaran' => $this->request->getVar('periode_pendaftaran'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        ]);
        session()->setFlashdata('pesan', 'Data Siakad berhasil ditambahkan.');
        return redirect()->to('/siakad/index');
    }
    public function update($id)
    {

        $data =
            [
                'nim' => $this->request->getVar('nim'),
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nama_ibu' => $this->request->getVar('nama_ibu'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'periode_pendaftaran' => $this->request->getVar('periode_pendaftaran'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),

            ];

        $this->SiakadModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Siakad berhasil diubah.');
        return redirect()->to('/siakad/index');
    }


    //--------------------------------------------------------------------

}
