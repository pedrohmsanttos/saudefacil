<?php

use Phinx\Migration\AbstractMigration;

class AddTokenToUsers extends AbstractMigration
{
    public function up()
    {
      $table = $this->table('users');
      $table->addColumn('token', 'string', array('after' => 'password'))
            ->update();
    }
}
