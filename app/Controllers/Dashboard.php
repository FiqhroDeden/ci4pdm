<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\UsersModel;
use App\Models\rolesModel;
use App\Models\levelModel;
use App\Models\FakultasModel;

class Dashboard extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->PdmModel = new PengajuanModel();
        $this->UsersModel = new UsersModel();
        $this->rolesModel = new rolesModel();
        $this->levelModel = new levelModel();
        $this->FakultasModel = new FakultasModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pdm1' => $this->PdmModel->where('status', 'Menunggu Konfirmasi')->countAllResults(),
            'pdm2' => $this->PdmModel->Where('status', 'Diproses')->countAllResults(),
            'pdm3' => $this->PdmModel->where('status', 'Selesai')->countAllResults(),
            'pdm4' => $this->PdmModel->where('status', 'Ditolak')->countAllResults(),
            'user' => $this->UsersModel->countAll(),
            'fakultas' => $this->FakultasModel->getfakultas()
        ];

        return view('dashboard/index', $data);
    }










    //--------------------------------------------------------------------

}
