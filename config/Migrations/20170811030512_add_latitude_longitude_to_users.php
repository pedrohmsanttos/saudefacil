<?php

use Phinx\Migration\AbstractMigration;

class AddLatitudeLongitudeToUsers extends AbstractMigration
{
    public function up()
    {
      $table = $this->table('users');
      $table->addColumn('latitude', 'string', array('after' => 'deficiency_type', 'null' => true))
            ->addColumn('longitude', 'string', array('after' => 'latitude', 'null' => true))
            ->update();
    }
}
