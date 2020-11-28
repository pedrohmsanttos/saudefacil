<?php

use Phinx\Migration\AbstractMigration;
/**
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 */
class CreateConsultations extends AbstractMigration
{
    /**
     * Up Method.
     *
     * Consultas marcadas.
     *
     * Mais informações: 
     * 
     */
    public function up()
    {
        $table = $this->table('consultations');
        $table->addColumn('day', 'date')
              ->addColumn('hour', 'string')
              ->addColumn('specialty_id', 'integer', ['null' => true])
              ->addColumn('user_id', 'integer', ['null' => true])
              ->addColumn('status_id', 'integer', ['default' => '1'])
              ->addColumn('district_id', 'integer',, ['null' => true])
              ->addColumn('doctor_id', 'integer', ['null' => true])
              ->addColumn('note', 'text', ['null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime', ['null' => true])
              ->addIndex(['specialty_id', 'user_id', 'status_id', 'district_id', 'doctor_id']) 
              ->addForeignKey('specialty_id', 'specialties', 'id')  
              ->addForeignKey('user_id', 'users', 'id')  
              ->addForeignKey('status_id', 'status_consultations', 'id')  
              ->addForeignKey('district_id', 'districts', 'id')  
              ->create();

              /*
                consultas (consultations)
                    - dia - day (date)
                    - hora - hour (string)
                    - especialidade - specialty_id (int - specialties.id)
                    - bairro para atendimento - district (ind - districts.id)   
                    - observação - note (text)
                    - usuário - user_id (int - users.id)
                    - status - status (int - status.id)
                    - created
                    - modified
              */
    }
}
