<?php

use Phinx\Migration\AbstractMigration;

class CreateHealthUnit extends AbstractMigration
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
        $table = $this->table('units');
        $table->addColumn('name', 'string')
              ->addColumn('cnes', 'string', ['null' => true])
              ->addColumn('rpa', 'integer', ['null' => true])
              ->addColumn('address', 'string')
              ->addColumn('phone', 'string')
              ->addColumn('latitude', 'string', ['null' => true])
              ->addColumn('longitude', 'string', ['null' => true])
              ->addColumn('district_id', 'integer')
              ->addIndex(['district_id']) 
              ->addForeignKey('district_id', 'districts', 'id')  
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
        ->create();

    }
}
