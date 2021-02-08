<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siakad extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'siakad_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nim'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'nama_lengkap' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255'
			],
			'nama_ibu' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255'
			],
			'tempat_lahir' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255'
			],
			'tanggal_lahir' => [
				'type'           => 'DATETIME',

			],
			'periode_pendaftaran' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255'
			],
			'jenis_kelamin' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255'
			],
		]);
		$this->forge->addKey('siakad_id', true);
		$this->forge->createTable('siakad');
	}

	public function down()
	{
		$this->forge->dropTable('siakad');
	}
}
