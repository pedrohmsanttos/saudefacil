<?php

use Phinx\Migration\AbstractMigration;

class AddUnitToConsultations extends AbstractMigration
{

    public function up()
    {
      $table = $this->table('consultations');
      $table->addColumn('unit_id', 'integer', ['after' => 'district_id', 'null' => true])
            ->addIndex(['unit_id'])
            ->addForeignKey('unit_id', 'units', 'id')
            ->update();
    }
}
