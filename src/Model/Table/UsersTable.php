<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

use Cake\I18n\Date;
use Cake\I18n\Time;


/**
 * Users Model
 *
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 *
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default beforeMarshal.
     *
     * @param Event $event, ArrayObject $data, ArrayObject $options.
     * @return null
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){

        if(!empty($data['birthday'])){
            $data['birthday'] = str_replace('/', '-', $data['birthday']);
            $birthday = new Date($data['birthday']);
            $birthday->setTimezone(new \DateTimeZone('America/New_York'));

            $data['birthday'] = $birthday;
        }

        // if(!empty($data['password'])){
        //   $data['token']    = MD5($data['password'] . KEY_TOKEN);
        // }
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        // $validator
        //     ->requirePresence('name', 'create')
        //     ->notEmpty('name');
        //
        // $validator
        //     ->date('birthday')
        //     ->requirePresence('birthday', 'create')
        //     ->notEmpty('birthday', 'Campo de data de nascimento é obrigatório');
        //
        // $validator
        //     ->email('username')
        //     ->requirePresence('username', 'create')
        //     ->notEmpty('username', 'Campo e-mail é obrigatório');
        //
        //
        // $validator
        //     ->requirePresence('password', 'create')
        //     ->notEmpty('password');
        //
        // $validator
        //     ->allowEmpty('number_sus');
        //
        // $validator
        //     ->boolean('responsible_familiar')
        //     ->requirePresence('responsible_familiar', 'create')
        //     ->notEmpty('responsible_familiar');
        //
        // $validator
        //     ->requirePresence('gender', 'create')
        //     ->notEmpty('gender');
        //
        // $validator
        //     ->requirePresence('breed', 'create')
        //     ->notEmpty('breed');
        //
        // $validator
        //     ->requirePresence('cellphone', 'create')
        //     ->notEmpty('cellphone');
        //
        // $validator
        //     ->requirePresence('phone', 'create')
        //     ->notEmpty('phone');
        //
        // $validator
        //     ->boolean('deficiency')
        //     ->requirePresence('deficiency', 'create')
        //     ->notEmpty('deficiency');

        return $validator;
    }

    public function afterSave($created, $options = array()){
        if ($created) {
            $event = new Event('Model.User.updateLocalUser', $this, $options);
            $this->eventManager()->dispatch($event);
        }
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'], ['message' => 'E-mail já cadastrado no sistema!']));
        return $rules;
    }

    // dar uma lida melhor nas validações http://book.cakephp.org/3.0/en/orm/validation.html



}
