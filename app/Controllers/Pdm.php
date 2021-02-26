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
                'rules' => 'max_size[akte,3024]|ext_in[akte,pdf]',
                'errors' => [
                    // 'required' => 'Akte Wajib di Upload',
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF',
                ]
            ],
            'ktp' => [
                'rules' => 'max_size[ktp,3024]|ext_in[ktp,pdf]',
                'errors' => [
                    // 'required' => 'KTP Wajib di Upload',
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF',
                ]
            ],
            'kk' => [
                'rules' => 'max_size[kk,3024]|ext_in[kk,pdf]',
                'errors' => [
                    // 'required' => 'Kartu Keluarga Wajib di Upload',
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF',
                ]
            ],
            'ktm' => [
                'rules' => 'max_size[ktm,3024]|ext_in[ktm,pdf]',
                'errors' => [
                    // 'required' => 'Ktm atau surat keterangan ktm wajib diupload',
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'ijasah' => [
                'rules' => 'max_size[ijasah,3024]|ext_in[ijasah,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'transkrip' => [
                'rules' => 'max_size[transkrip,3024]|ext_in[transkrip,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],
            'akte4' => [
                'rules' => 'max_size[akte4,3024]|ext_in[akte4,pdf]',
                'errors' => [
                    'max_size' => 'File yang anda coba upload melebihi 500KB',
                    'ext_in' => 'File yang anda coba upload bukan file PDF'
                ]
            ],

        ])) {
            return redirect()->to('/pdm')->withInput();
        }

        // ambil file
        $fileAkte = $this->request->getFile('akte');
        $fileKtp = $this->request->getFile('ktp');
        $fileKk = $this->request->getFile('kk');
        $fileKtm = $this->request->getFile('ktm');
        $fileIjasah = $this->request->getFile('ijasah');
        $fileTranskrip = $this->request->getFile('transkrip');
        $fileAkte4 = $this->request->getFile('akte4');

        //Akte
        if ($fileAkte->getError() == 4) {
            $namaAkte = 'tidakada';
        } else {
            $namaAkte = $fileAkte->getRandomName();
            $fileAkte->move('file/akte', $namaAkte);
        }
        //Ktp
        if ($fileKtp->getError() == 4) {
            $namaKtp = 'tidakada';
        } else {
            $namaKtp = $fileKtp->getRandomName();
            $fileKtp->move('file/ktp', $namaKtp);
        }
        //Kartu Keluarga
        if ($fileKk->getError() == 4) {
            $namaKk = 'tidakada';
        } else {
            $namaKk = $fileKk->getRandomName();
            $fileKk->move('file/kk', $namaKk);
        }
        //Ktm
        if ($fileKtm->getError() == 4) {
            $namaKtm = 'tidakada';
        } else {
            $namaKtm = $fileKtm->getRandomName();
            $fileKtm->move('file/ktm', $namaKtm);
        }
        //Ijasah
        if ($fileIjasah->getError() == 4) {
            $namaIjasah = 'tidakada';
        } else {
            $namaIjasah = $fileIjasah->getRandomName();
            $fileIjasah->move('file/ijasah', $namaIjasah);
        }
        //Transkrip
        if ($fileTranskrip->getError() == 4) {
            $namaTranskrip = 'tidakada';
        } else {
            $namaTranskrip = $fileTranskrip->getRandomName();
            $fileTranskrip->move('file/transkrip', $namaTranskrip);
        }
        //Akte4
        if ($fileAkte4->getError() == 4) {
            $namaAkte4 = 'tidakada';
        } else {
            $namaAkte4 = $fileAkte4->getRandomName();
            $fileAkte4->move('file/akte4', $namaAkte4);
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
            'ktp' => $namaKtp,
            'kk' => $namaKk,
            'ktm' => $namaKtm,
            'ijasah' => $namaIjasah,
            'transkrip' => $namaTranskrip,
            'akte4' => $namaAkte4,
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan. silahkan mengecek menu riwayat perubahan data untuk memantau pengajuan anda');
        return redirect()->to('/pdm');
    }



    //--------------------------------------------------------------------

}
