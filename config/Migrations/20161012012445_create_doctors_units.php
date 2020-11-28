<?php

use Phinx\Migration\AbstractMigration;

class CreateDoctorsUnits extends AbstractMigration
{

    public function up(){
      $table = $this->table('doctors_units');
      $table->addColumn('doctor_id', 'integer')
            ->addColumn('unit_id', 'integer')
            ->addIndex(['unit_id', 'doctor_id'])
            ->addForeignKey('unit_id', 'units', 'id')
            ->addForeignKey('doctor_id', 'doctors', 'id')
            ->create();
    }
}
