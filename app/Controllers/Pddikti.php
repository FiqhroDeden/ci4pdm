<?php

namespace App\Controllers;

use App\Models\PddiktiModel;

class Pddikti extends BaseController
{
    public function __construct()
    {
        $this->Pddiktimodel = new PddiktiModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Data Pddikti',
                'pddikti' => $this->Pddiktimodel->findAll()
            ];
        return view('pddikti/index', $data);
    }

    public  function save()
    {
        $this->Pddiktimodel->save([
            'nim' => $this->request->getVar('nim'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_ibu' => $this->request->getVar('nama_lengkap'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'periode_pendaftaran' => $this->request->getVar('periode_pendaftaran'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        ]);
        session()->setFlashdata('pesan', 'Data Pddikti berhasil ditambahkan.');
        return redirect()->to('/pddikti/index');
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

        $this->Pddiktimodel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Pddikti berhasil diubah.');
        return redirect()->to('/pddikti/index');
    }


    //--------------------------------------------------------------------

}
