<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\UsersModel;
use App\Models\rolesModel;
use App\Models\levelModel;
use App\Models\FakultasModel;

class Admin extends BaseController
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

	public function save()
	{
		$options = [
			'cost' => 10,
		];
		$password = $this->request->getVar('password_hash');
		$pass_hash = password_hash(base64_encode(
			hash('sha384', $password, true)
		), PASSWORD_DEFAULT, $options);
		$this->UsersModel->save([
			'nim' => $this->request->getVar('nim'),
			'fullname' => $this->request->getVar('fullname'),
			'hakfakultas' => $this->request->getVar('hakfakultas'),
			'email' => $this->request->getVar('email'),
			'no_hp' => $this->request->getVar('no_hp'),
			'level' => $this->request->getVar('group_id'),
			'username' => $this->request->getVar('username'),
			'active' => 1,
			'password_hash' => $pass_hash,

		]);
		// set role
		$conn = \Config\Database::connect();

		$kode = $conn->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
		$set = $kode->getResultArray();
		foreach ($set as $s) {
			$user_id = $s['id'];
		}
		//save
		$this->levelModel->save([
			'group_id' => $this->request->getVar('group_id'),
			'user_id' => $user_id,
		]);
		session()->setFlashdata('pesan', 'Data Pegawai berhasil ditambahkan.');
		return redirect()->to('/admin/operator');
	}

	public function ubah()
	{
		echo json_encode($this->UsersModel->getedit($_POST['id']));
	}

	public function update()
	{
		$id = $this->request->getVar('id');
		$oldpass = $this->request->getVar('oldpass');
		$pass = $this->request->getVar('password_hash');

		if ($oldpass == $pass) {
			$users = [
				'nim' => $this->request->getVar('nim'),
				'fullname' => $this->request->getVar('fullname'),
				'hakfakultas' => $this->request->getVar('hakfakultas'),
				'email' => $this->request->getVar('email'),
				'no_hp' => $this->request->getVar('no_hp'),
				'username' => $this->request->getVar('username'),

			];
		} else {
			$options = [
				'cost' => 10,
			];
			$password = $this->request->getVar('password_hash');
			$pass_hash = password_hash(base64_encode(
				hash('sha384', $password, true)
			), PASSWORD_DEFAULT, $options);
			$users = [
				'nim' => $this->request->getVar('nim'),
				'fullname' => $this->request->getVar('fullname'),
				'hakfakultas' => $this->request->getVar('hakfakultas'),
				'email' => $this->request->getVar('email'),
				'no_hp' => $this->request->getVar('no_hp'),
				'level' => $this->request->getVar('group_id'),
				'username' => $this->request->getVar('username'),
				'active' => 1,
				'password_hash' => $pass_hash,

			];
		}

		$this->UsersModel->update($id, $users);
		session()->setFlashdata('pesan', 'Data Pegawai berhasil diupdate.');
		return redirect()->to('/admin/operator');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'pdm' => $this->PdmModel->countAll(),
			'user' => $this->UsersModel->countAll(),
			'fakultas' => $this->FakultasModel->getfakultas()
		];

		return view('admin/index', $data);
	}

	public function operator()
	{

		$data['title'] = 'List Operator';
		$this->builder->select('users.id as userid, username, fullname, email, name, nama_fakultas');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->join('fakultas', 'fakultas.fakultas_id = users.hakfakultas');
		$query = $this->builder->getWhere(['name' => 'operator']);

		$user = $query->getResult();
		$data = [
			'title' => 'Dashboard',
			'pdm' => $this->PdmModel->countAll(),
			'user' => $this->UsersModel->countAll(),
			'roles' => $this->rolesModel->getroles(),
			'users' => $user,
			'fakultas' => $this->FakultasModel->getfakultas()
		];
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

	public function hapus()
	{
		$id = $this->request->getVar('id');
		$this->UsersModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/admin/operator');
	}


	//--------------------------------------------------------------------

}
