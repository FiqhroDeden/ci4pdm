<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pddikti extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pddikti_id'          => [
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
				'type'           => 'DATE',

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
		$this->forge->addKey('pddikti_id', true);
		$this->forge->createTable('pddikti');
	}

	public function down()
	{
		$this->forge->dropTable('pddikti');
	}
}
