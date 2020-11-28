<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;
use App\Model\Entity\District;

class CreateAdmin extends AbstractMigration
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
        $table = $this->table('admins');
        $table->addColumn('name', 'string')
              ->addColumn('role', 'string')
              ->addColumn('username', 'string')
              ->addColumn('password', 'string')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
        ->create();


         $data = [ 
                    [
                        'name' => 'Pedro Santos', 
                        'username' => 'phmsanttos@gmail.com',
                        'password' => '101010',
                        'role' => 'Suporte',
                        'modified' => false
                    ],
                ];

        $adminTable = TableRegistry::get('Admins');
        foreach ($data as $value) {
          $adminTable->save($adminTable->newEntity($value));
        }
    }


}
