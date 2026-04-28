<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'username'   => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'role'       => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'petugas'
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP')
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
