<?php

namespace App\Controllers;


use App\Models\cekdataModel;
use App\Models\UsersModel;

class Cekdata extends BaseController
{
    public function __construct()
    {
        $this->cekdataModel = new cekdataModel();
        $this->UsersModel = new UsersModel();
    }
    public function index()
    {


        $data = [
            'title' => 'Cek Data',
            'siakad' => $this->cekdataModel->siakad(),
            'pddikti' => $this->cekdataModel->pddikti(),


        ];
        return view('cekdata/index', $data);
    }
    // public function index()
    // {
    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword) {
    //         $siakad = $this->SiakadModel->search($keyword);
    //     } else {
    //         $siakad = $this->SiakadModel;
    //     }
    //     if ($keyword) {
    //         $pddikti = $this->PddiktiModel->search($keyword);
    //     } else {
    //         $pddikti = $this->PddiktiModel;
    //     }


    //     $data = [
    //         'title' => 'Cek Data',
    //         'siakad' => $siakad->paginate(10, 'siakad'),
    //         'pddikti' => $pddikti->paginate(10, 'pddikti')


    //     ];
    //     return view('cekdata/index', $data);
    // }


    //--------------------------------------------------------------------

}
