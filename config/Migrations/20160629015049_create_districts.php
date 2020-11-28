<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;
use App\Model\Entity\District;

/**
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 */
class CreateDistricts extends AbstractMigration
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
        $table = $this->table('districts');
        $table->addColumn('name', 'string')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->create();

         $data = [ 
                    ['name' => 'Aflitos', 'modified' => false],
                    ['name' => 'Afogados', 'modified' => false],
                    ['name' => 'Água Fria', 'modified' => false],
                    ['name' => 'Alto do Mandu', 'modified' => false],
                    ['name' => 'Alto José Bonifácio', 'modified' => false],
                    ['name' => 'Alto José do Pinho', 'modified' => false],
                    ['name' => 'Alto Santa Terezinha', 'modified' => false],
                    ['name' => 'Apipucos', 'modified' => false],
                    ['name' => 'Areias', 'modified' => false],
                    ['name' => 'Arruda', 'modified' => false],
                    ['name' => 'Barro', 'modified' => false],
                    ['name' => 'Beberibe', 'modified' => false],
                    ['name' => 'Boa Viagem', 'modified' => false],
                    ['name' => 'Boa Vista', 'modified' => false],
                    ['name' => 'Bomba do Hemetério', 'modified' => false],
                    ['name' => 'Bongi', 'modified' => false],
                    ['name' => 'Brasília Teimosa', 'modified' => false],
                    ['name' => 'Brejo da Guabiraba', 'modified' => false],
                    ['name' => 'Brejo de Beberibe', 'modified' => false],
                    ['name' => 'Cabanga', 'modified' => false],
                    ['name' => 'Caçote', 'modified' => false],
                    ['name' => 'Cajueiro', 'modified' => false],
                    ['name' => 'Campina do Barreto', 'modified' => false],
                    ['name' => 'Campo Grande', 'modified' => false],
                    ['name' => 'Casa Amarela', 'modified' => false],
                    ['name' => 'Casa Forte', 'modified' => false],
                    ['name' => 'Caxangá', 'modified' => false],
                    ['name' => 'Cidade Universitária', 'modified' => false],
                    ['name' => 'Coelhos', 'modified' => false],
                    ['name' => 'Cohab', 'modified' => false],
                    ['name' => 'Coqueiral', 'modified' => false],
                    ['name' => 'Cordeiro', 'modified' => false],
                    ['name' => 'Córrego do Jenipapo', 'modified' => false],
                    ['name' => 'Curado', 'modified' => false],
                    ['name' => 'Derby', 'modified' => false],
                    ['name' => 'Dois Irmãos', 'modified' => false],
                    ['name' => 'Dois Unidos', 'modified' => false],
                    ['name' => 'Encruzilhada', 'modified' => false],
                    ['name' => 'Engenho do Meio', 'modified' => false],
                    ['name' => 'Espinheiro', 'modified' => false],
                    ['name' => 'Estância', 'modified' => false],
                    ['name' => 'Fundão', 'modified' => false],
                    ['name' => 'Graças', 'modified' => false],
                    ['name' => 'Guabiraba', 'modified' => false],
                    ['name' => 'Hipódromo', 'modified' => false],
                    ['name' => 'Ibura', 'modified' => false],
                    ['name' => 'Ilha do Leite', 'modified' => false],
                    ['name' => 'Ilha do Retiro', 'modified' => false],
                    ['name' => 'Ilha Joana Bezerra', 'modified' => false],
                    ['name' => 'Imbiribeira', 'modified' => false],
                    ['name' => 'Iputinga', 'modified' => false],
                    ['name' => 'Jaqueira', 'modified' => false],
                    ['name' => 'Jardim São Paulo', 'modified' => false],
                    ['name' => 'Jiquiá', 'modified' => false],
                    ['name' => 'Jordão', 'modified' => false],
                    ['name' => 'Linha do Tiro', 'modified' => false],
                    ['name' => 'Macaxeira', 'modified' => false],
                    ['name' => 'Madalena', 'modified' => false],
                    ['name' => 'Mangabeira', 'modified' => false],
                    ['name' => 'Mangueira', 'modified' => false],
                    ['name' => 'Monteiro', 'modified' => false],
                    ['name' => 'Morro da Conceição', 'modified' => false],
                    ['name' => 'Mustardinha', 'modified' => false],
                    ['name' => 'Nova Descoberta', 'modified' => false],
                    ['name' => 'Paissandu', 'modified' => false],
                    ['name' => 'Parnamirim', 'modified' => false],
                    ['name' => 'Passarinho', 'modified' => false],
                    ['name' => 'Pau Ferro', 'modified' => false],
                    ['name' => 'Peixinhos', 'modified' => false],
                    ['name' => 'Pina', 'modified' => false],
                    ['name' => 'Poço', 'modified' => false],
                    ['name' => 'Ponto de Parada', 'modified' => false],
                    ['name' => 'Porto da Madeira', 'modified' => false],
                    ['name' => 'Prado', 'modified' => false],
                    ['name' => 'Recife', 'modified' => false],
                    ['name' => 'Rosarinho', 'modified' => false],
                    ['name' => 'San Martin', 'modified' => false],
                    ['name' => 'Sancho', 'modified' => false],
                    ['name' => 'Santana', 'modified' => false],
                    ['name' => 'Santo Amaro', 'modified' => false],
                    ['name' => 'Santo Antônio', 'modified' => false],
                    ['name' => 'São José', 'modified' => false],
                    ['name' => 'Sítio dos Pintos', 'modified' => false],
                    ['name' => 'Soledade', 'modified' => false],
                    ['name' => 'Tamarineira', 'modified' => false],
                    ['name' => 'Tejipió', 'modified' => false],
                    ['name' => 'Torre', 'modified' => false],
                    ['name' => 'Torreão', 'modified' => false],
                    ['name' => 'Torrões', 'modified' => false],
                    ['name' => 'Totó', 'modified' => false],
                    ['name' => 'Várzea', 'modified' => false],
                    ['name' => 'Vasco da Gama', 'modified' => false],
                    ['name' => 'Zumbi', 'modified' => false]
                ];

        $districtsTable = TableRegistry::get('districts');
        foreach ($data as $value) {
          $districtsTable->save($districtsTable->newEntity($value));
        }
    }
}
