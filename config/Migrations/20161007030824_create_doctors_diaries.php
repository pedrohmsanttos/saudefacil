<?php

use Phinx\Migration\AbstractMigration;

class CreateDoctorsDiaries extends AbstractMigration
{
    public function up(){

      $table = $this->table('doctors_diaries');
      $table->addColumn('doctor_id', 'integer')
            ->addColumn('unit_id', 'integer')
            ->addColumn('hour', 'string')
            ->addColumn('day', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addIndex(['unit_id', 'doctor_id'])
            ->addForeignKey('unit_id', 'units', 'id')
            ->addForeignKey('doctor_id', 'doctors', 'id')
            ->create();
    }
}
