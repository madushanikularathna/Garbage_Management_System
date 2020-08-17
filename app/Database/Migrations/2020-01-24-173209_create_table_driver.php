<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDriver extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'Did'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE
			],
			'fullname'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'phone'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '12',
			],
			
	]);
	$this->forge->addKey('Did', TRUE);
	$this->forge->createTable('driver');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('driver');
	}
}
