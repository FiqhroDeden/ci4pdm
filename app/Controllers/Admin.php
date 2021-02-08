<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\UsersModel;

class Admin extends BaseController
{
	protected $db, $builder;
	public function __construct()
	{
		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('users');
		$this->PdmModel = new PengajuanModel();
		$this->UsersModel = new UsersModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'pdm' => $this->PdmModel->countAll(),
			'user' => $this->UsersModel->countAll()
		];

		return view('admin/index', $data);
	}

	public function operator()
	{

		$data['title'] = 'List Operator';
		$this->builder->select('users.id as userid, username, fullname, email, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$query = $this->builder->getWhere(['name' => 'operator']);

		$data['users'] = $query->getResult();
		return view('admin/operator', $data);
	}


	public function mahasiswa()
	{

		$data['title'] = 'list Mahasiswa';
		$this->builder->select('users.id as userid, username, fullname, nim, email, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$query = $this->builder->getWhere(['name' => 'mahasiswa']);

		$data['users'] = $query->getResult();
		return view('admin/mahasiswa', $data);
	}
	public function detail($id = 0)
	{
		$data['title'] = 'Operator Detail';
		// $users = new \Myth\Auth\Models\UserModel();
		// $data['users'] = $users->findAll();


		$this->builder->select('users.id as userid, username, email, fullname, user_image, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id', $id);
		$query = $this->builder->get();

		$data['user'] = $query->getRow();

		if (empty($data['user'])) {
			return redirect()->to('/admin');
		}
		return view('admin/detail', $data);
	}


	//--------------------------------------------------------------------

}
