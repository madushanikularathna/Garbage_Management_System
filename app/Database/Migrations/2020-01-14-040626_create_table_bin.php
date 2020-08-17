<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBin extends Migration
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
                        'city'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'destination' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'best_route' => [
				'type'           => 'TEXT',
				'constraint'     => '255',
			],
			'driver_id' => [
				'type'           => 'TEXT',
                                'constraint'     => '255',
                                'null'           => TRUE,
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('bin');
        }

        public function down()
        {
                $this->forge->dropTable('bin');
        }
}