<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\FakultasModel;
use App\Models\PdmModel;
use App\Models\UsersModel;
use Myth\Auth\Models\UserModel;

class Pdm extends BaseController
{
    public function __construct()
    {
        $this->ProdiModel = new ProdiModel();
        $this->FakultasModel = new FakultasModel();
        $this->PdmModel = new PdmModel();
        $this->UsersModel = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pengajuan PDM',
            'fakultas' => $this->FakultasModel->getfakultas(),
            'prodi' => $this->ProdiModel->getprodi(),

            'validation' => \Config\Services::validation()
        ];

        return view('pdm/index', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        // validasi input
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi.'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM tidak boleh kosong.'
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Hp/WA tidak boleh kosong.'
                ]
            ],
            'fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap pilih fakultas anda.'
                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap pilih Program Studi anda.'
                ]
            ],
            'lokasi_data' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap pilih Lokasi data yang anda ingin ubah.'
                ]
            ],
            'data' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap pilih data apa saja yang anda ingin ubah.'
                ]
            ],
            'akte' => [
                'rules' => 'max_size[akte,1024]|ext_in[akte,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 1MB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'ktm' => [
                'rules' => 'max_size[ktm,1024]|ext_in[ktm,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 1MB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'ijasah' => [
                'rules' => 'max_size[ijasah,1024]|ext_in[ijasah,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 1MB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'surat' => [
                'rules' => 'max_size[surat,1024]|ext_in[surat,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 1MB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ]

        ])) {
            return redirect()->to('/pdm')->withInput();
        }

        // ambil file akte
        $fileAkte = $this->request->getFile('akte');
        $fileKtm = $this->request->getFile('ktm');
        $fileIjasah = $this->request->getFile('ijasah');
        $fileSurat = $this->request->getFile('surat');

        if ($fileAkte->getError() == 4) {
            $namaAkte = 'tidakada';
        } else {
            $namaAkte = $fileAkte->getRandomName();
            $fileAkte->move('file/akte', $namaAkte);
        }

        if ($fileKtm->getError() == 4) {
            $namaKtm = 'tidakada';
        } else {
            $namaKtm = $fileKtm->getRandomName();
            $fileKtm->move('file/ktm', $namaKtm);
        }

        if ($fileIjasah->getError() == 4) {
            $namaIjasah = 'tidakada';
        } else {
            $namaIjasah = $fileIjasah->getRandomName();
            $fileIjasah->move('file/ijasah', $namaIjasah);
        }

        if ($fileSurat->getError() == 4) {
            $namaSurat = 'tidakada';
        } else {
            $namaSurat = $fileSurat->getRandomName();
            $fileSurat->move('file/surat_penerimaan', $namaSurat);
        }
        $getdata = $this->request->getVar('data[]');
        $data = array('getdata' => implode(",", $getdata),);

        $id = user_id();

        $this->PdmModel->save([
            'id_pengirim' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nim' => $this->request->getVar('nim'),
            'nomor' => $this->request->getVar('nomor'),
            'fakultas' => $this->request->getVar('fakultas'),
            'prodi' => $this->request->getVar('prodi'),
            'lokasi_data' => $this->request->getVar('lokasi_data'),
            'data' => $data,
            'akte' => $namaAkte,
            'ktm' => $namaKtm,
            'ijasah' => $namaIjasah,
            'surat' => $namaSurat,
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/pdm');
    }



    //--------------------------------------------------------------------

}
