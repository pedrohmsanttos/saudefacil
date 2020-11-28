<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Specialty;
/**
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 */
class CreateSpecialties extends AbstractMigration
{
    /**
     * Change Method.
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
        $table = $this->table('specialties');
        $table->addColumn('name', 'string')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->create();


        $data = [
                    ['name' => 'Acupuntura',                                    'modified' => false],
                    ['name' => 'Alergia e Imunologia',                          'modified' => false],
                    ['name' => 'Anestesiologia',                                'modified' => false],
                    ['name' => 'Angiologia',                                    'modified' => false],
                    ['name' => 'Cancerologia',                                  'modified' => false],
                    ['name' => 'Cardiologia',                                   'modified' => false],
                    ['name' => 'Cirurgia Cardiovascular',                       'modified' => false],
                    ['name' => 'Cirurgia da Mão',                               'modified' => false],
                    ['name' => 'Cirurgia de Cabeça e Pescoço',                  'modified' => false],
                    ['name' => 'Cirurgia do Aparelho Digestivo',                'modified' => false],
                    ['name' => 'Cirurgia Geral',                                'modified' => false],
                    ['name' => 'Cirurgia Pediátrica',                           'modified' => false],
                    ['name' => 'Cirurgia Plástica',                             'modified' => false],
                    ['name' => 'Cirurgia Torácica',                             'modified' => false],
                    ['name' => 'Cirurgia Vascular',                             'modified' => false],
                    ['name' => 'Clínica Ginecologica',                          'modified' => false],
                    ['name' => 'Clínica Médica',                                'modified' => false],
                    ['name' => 'Clínica Pediátrica',                            'modified' => false],
                    ['name' => 'Colposcopia',                                   'modified' => false],
                    ['name' => 'Coloproctologia',                               'modified' => false],
                    ['name' => 'Dermatologia',                                  'modified' => false],
                    ['name' => 'Endocrinologia',                                'modified' => false],
                    ['name' => 'Endocrinologia e Metabologia',                  'modified' => false],
                    ['name' => 'Endoscopia',                                    'modified' => false],
                    ['name' => 'Fisioterapia',                                  'modified' => false],
                    ['name' => 'Fonoaudiologia',                                'modified' => false],
                    ['name' => 'Gastroenterologia',                             'modified' => false],
                    ['name' => 'Genética Médica',                               'modified' => false],
                    ['name' => 'Geriatria',                                     'modified' => false],
                    ['name' => 'Ginecologia',                                   'modified' => false],
                    ['name' => 'Ginecologia e Obstetrícia',                     'modified' => false],
                    ['name' => 'Hematologia e Hemoterapia',                     'modified' => false],
                    ['name' => 'Hebiatria',                                     'modified' => false],
                    ['name' => 'Homeopatia',                                    'modified' => false],
                    ['name' => 'Infectologia',                                  'modified' => false],
                    ['name' => 'Mastologia',                                    'modified' => false],
                    ['name' => 'Medicina de Família e Comunidade',              'modified' => false],
                    ['name' => 'Medicina do Trabalho',                          'modified' => false],
                    ['name' => 'Medicina do Tráfego',                           'modified' => false],
                    ['name' => 'Medicina Esportiva',                            'modified' => false],
                    ['name' => 'Medicina Física e Reabilitação',                'modified' => false],
                    ['name' => 'Medicina Intensiva',                            'modified' => false],
                    ['name' => 'Medicina Legal e Perícia Médica',               'modified' => false],
                    ['name' => 'Medicina Nuclear',                              'modified' => false],
                    ['name' => 'Medicina Preventiva e Social',                  'modified' => false],
                    ['name' => 'Nefrologia',                                    'modified' => false],
                    ['name' => 'Neurocirurgia',                                 'modified' => false],
                    ['name' => 'Neurologia',                                    'modified' => false],
                    ['name' => 'Nutrologia',                                    'modified' => false],
                    ['name' => 'Obstetrícia',                                   'modified' => false],
                    ['name' => 'Odontologia',                                   'modified' => false],
                    ['name' => 'Odontologia Clínica',                           'modified' => false],
                    ['name' => 'Odontopediatria',                               'modified' => false],
                    ['name' => 'Oftalmologia',                                  'modified' => false],
                    ['name' => 'Ortopedia e Traumatologia',                     'modified' => false],
                    ['name' => 'Otorrinolaringologia',                          'modified' => false],
                    ['name' => 'Patologia',                                     'modified' => false],
                    ['name' => 'Patologia Clínica/Medicina laboratorial',       'modified' => false],
                    ['name' => 'Pediatria',                                     'modified' => false],
                    ['name' => 'Pneumologia',                                   'modified' => false],
                    ['name' => 'Psicologia',                                    'modified' => false],
                    ['name' => 'Psiquiatria',                                   'modified' => false],
                    ['name' => 'Radiologia e Diagnóstico por Imagem',           'modified' => false],
                    ['name' => 'Radioterapia',                                  'modified' => false],
                    ['name' => 'Reumatologia',                                  'modified' => false],
                    ['name' => 'Urologia',                                      'modified' => false],
        ];

        $specialtiesTable = TableRegistry::get('specialties');
        foreach ($data as $value) {
          $specialtiesTable->save($specialtiesTable->newEntity($value));
        }
            /*
                - NAME
                - CREATED
                - MODIFIED
            */
    }
}
