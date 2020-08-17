<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
	public function up()
	{
			$this->forge->addField([
					'id'          => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => TRUE,
							'auto_increment' => TRUE
					],
					'email'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '100',
					],
					'password'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
					],
					'userRole'	=>[
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'default'		 => 'user'
					]
			]);
			$this->forge->addKey('id', TRUE);
			$this->forge->createTable('users');
	}

	public function down()
	{
			$this->forge->dropTable('users');
	}
}
