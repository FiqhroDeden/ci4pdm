<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pdm extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_users'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,

			],
			'nama_lengkap'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'nim'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'nomor'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'fakultas'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'prodi'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'lokasi_data'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'data'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'akte'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,

			],
			'ktm'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,

			],
			'ijasah'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,

			],
			'surat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,

			],
			'status'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null' => true,

			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('datapdm');
	}

	public function down()
	{
		$this->forge->dropTable('datapdm');
	}
}
