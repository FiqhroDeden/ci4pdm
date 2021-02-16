<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\UsersModel;
use App\Models\rolesModel;
use App\Models\levelModel;
use App\Models\FakultasModel;

class Profil extends BaseController
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
        $id = user_id();
        $this->builder->select('users.id as userid, username, email, fullname, nim, user_image, name, no_hp,');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Profil User',
            'user' => $query->getRow(),
            'fakultas' => $this->FakultasModel->getfakultas()
        ];

        return view('profil/index', $data);
    }
    public function edit()
    {
        $id = user_id();
        $this->builder->select('users.id as userid, username, email, fullname, nim, user_image, name, no_hp, password_hash');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Ubah User',
            'user' => $query->getRow(),
            'fakultas' => $this->FakultasModel->getfakultas()
        ];

        return view('profil/edit', $data);
    }
    public function update($id)
    {
        $id = $this->request->getVar('id');
        $oldpass = $this->request->getVar('oldpass');
        $pass = $this->request->getVar('password_hash');
        if ($pass == null) {
            $user = [
                'fullname' => $this->request->getVar('fullname'),
                'nim' => $this->request->getVar('nim'),
                'no_hp' => $this->request->getVar('no_hp'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),

            ];
        } elseif ($pass != null) {
            $options = [
                'cost' => 10,
            ];
            $password = $this->request->getVar('password_hash');
            $pass_hash = password_hash(base64_encode(
                hash('sha384', $password, true)
            ), PASSWORD_DEFAULT, $options);
            $user = [
                'fullname' => $this->request->getVar('fullname'),
                'nim' => $this->request->getVar('nim'),
                'no_hp' => $this->request->getVar('no_hp'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password_hash' => $pass_hash,
            ];
        }

        $this->UsersModel->update($id, $user);
        session()->setFlashdata('pesan', 'Data Pegawai berhasil diupdate.');
        return redirect()->to('/profil');
    }










    //--------------------------------------------------------------------

}
