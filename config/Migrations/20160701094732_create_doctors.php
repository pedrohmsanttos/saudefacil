<?php

use Phinx\Migration\AbstractMigration;

class CreateDoctors extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('doctors');
        $table->addColumn('name', 'string')
              ->addColumn('cfm', 'string')
              ->addColumn('unit_id', 'integer')
              ->addColumn('username', 'string')
              ->addColumn('password', 'string')
              ->addColumn('token', 'string')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->addIndex(['unit_id'])
              ->addForeignKey('unit_id', 'units', 'id')  
              ->create();
    }
}
