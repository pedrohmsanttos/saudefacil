<?php

use Phinx\Migration\AbstractMigration;
/**
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 */
class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('name', 'string')
              ->addColumn('birthday', 'date')
              ->addColumn('username', 'string')
              ->addColumn('password', 'string')
              ->addColumn('zip_code_address', 'string', ['null' => true])
              ->addColumn('address', 'string', ['null' => true])
              ->addColumn('number_address', 'string', ['null' => true])
              ->addColumn('complement_address', 'string', ['null' => true])
              ->addColumn('district_address', 'string', ['null' => true])
              ->addColumn('city_address', 'string', ['null' => true])
              ->addColumn('state_address', 'string', ['null' => true])
              ->addColumn('number_sus', 'string', ['null' => true])
              ->addColumn('responsible_familiar', 'boolean', ['null' => true])
              ->addColumn('responsible_number_sus', 'string', ['null' => true])
              ->addColumn('document_responsible', 'string', ['null' => true])
              ->addColumn('mother_name', 'string', ['null' => true])
              ->addColumn('unknown_mother', 'boolean', ['null' => true])
              ->addColumn('gender', 'string', ['null' => true])
              ->addColumn('sexual_orientation', 'string', ['null' => true])
              ->addColumn('breed', 'string', ['null' => true])
              ->addColumn('cellphone', 'string', ['null' => true])
              ->addColumn('phone', 'string', ['null' => true])
              ->addColumn('deficiency', 'boolean', ['null' => true])
              ->addColumn('deficiency_type', 'string', ['null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->create();


              /*
                    - Nome completo *
                    - Data Nascimento *
                    - N° Cartão Sus
                    - Responsável familiar?
                        Não >> N/ Cartão SUS responsável
                    - Sexo *
                    - Raça/Cor (Branca, Preta, Parda, Amarela, Indigena) *
                    - Nome da Mãe *
                        - Desconhecido
                    - Telefone celular
                    - Email
                    - Senha
                    - Possui Plano de Saúde privado?
                    - Orientação sexual? (Heterossexual, Lésbica, Travesti, gay, Bissexual, Transsexual, Outro)
                    - Tem alguma deficiência?
                        - Sim >> (Auditiva, Visual, Física, Intelectual/Cognitiva, Outra)
              */
    }
}
