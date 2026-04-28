<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiAntrean extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'id_poli' => ['type' => 'INT', 'null' => false],
            'id_dokter' => ['type' => 'INT', 'null' => false],
            'nama_pasien' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'nomor_antrean' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'is_unique' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'menunggu', 'null' => false],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'), 'null' => false]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_poli', 'm_poli', 'id_poli', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dokter', 'm_dokter', 'id_dokter', 'CASCADE', 'CASCADE');
        $this->forge->createTable('t_antrean');
    }

    public function down()
    {
        $this->forge->dropTable('t_antrean');
    }
}
