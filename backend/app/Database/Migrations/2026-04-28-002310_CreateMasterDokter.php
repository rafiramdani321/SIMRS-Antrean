<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMasterDokter extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokter' => ['type' => 'INT', 'auto_increment' => true],
            'id_poli' => ['type' => 'INT', 'null' => false],
            'nama_dokter' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false]
        ]);
        $this->forge->addKey('id_dokter', true);
        $this->forge->addForeignKey('id_poli', 'm_poli', 'id_poli', 'CASCADE', 'CASCADE');
        $this->forge->createTable('m_dokter');
    }

    public function down()
    {
        $this->forge->dropTable('m_dokter');
    }
}
