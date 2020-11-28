<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;
use App\Model\Entity\StatusConsultation;
/**
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 */
class CreateStatusConsultations extends AbstractMigration
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
        $table = $this->table('status_consultations');
        $table->addColumn('name', 'string')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->create();


         $data = [ 
                    ['name' => 'Nova', 'modified' => false],
                    ['name' => 'Em Análise', 'modified' => false],
                    ['name' => 'Cancelada', 'modified' => false],
                    ['name' => 'Aprovada', 'modified' => false],
                    ['name' => 'Reprovada', 'modified' => false],
                ];
                
        $statusSonsultationsTable = TableRegistry::get('status_consultations');
        foreach ($data as $value) {
          $statusSonsultationsTable->save($statusSonsultationsTable->newEntity($value));
        }

    }
}
