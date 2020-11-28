<?php

use Phinx\Migration\AbstractMigration;

class CreateUnitsSpecialties extends AbstractMigration
{
    
    public function up()
    {
        $table = $this->table('units_specialties');
        $table->addColumn('unit_id', 'integer')
              ->addColumn('specialty_id', 'integer')
              ->addIndex(['unit_id', 'specialty_id']) 
              ->addForeignKey('unit_id', 'units', 'id')  
              ->addForeignKey('specialty_id', 'specialties', 'id')
              ->create();  
    }
}
