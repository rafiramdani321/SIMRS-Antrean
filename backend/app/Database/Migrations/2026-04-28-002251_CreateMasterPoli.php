<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMasterPoli extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_poli' => ['type' => 'INT', 'auto_increment' => true],
            'nama_poli' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'is_unique' => true],
            'slug'      => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => false, 'is_unique' => true],
            'prefix' => ['type' => 'CHAR', 'constraint' => 10, 'null' => false, 'is_unique' => true]
        ]);
        $this->forge->addKey('id_poli', true);
        $this->forge->createTable("m_poli");
    }

    public function down()
    {
        $this->forge->dropTable('m_poli');
    }
}
