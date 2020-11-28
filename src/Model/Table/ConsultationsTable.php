<?php
namespace App\Model\Table;

use App\Model\Entity\Consultation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Event\Event;
use ArrayObject;

use Cake\I18n\Date;
use Cake\I18n\Time;

use Cake\Log\Log;

use Cake\ORM\TableRegistry;

/**
 * Consultations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Specialties
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $StatusConsultations
 * @property \Cake\ORM\Association\BelongsTo $Districts
 */
class ConsultationsTable extends Table
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

        $this->table('consultations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Specialties', [
            'foreignKey' => 'specialty_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StatusConsultations', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'LEFT'
        ]);
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

        $validator
            ->date('day')
            ->requirePresence('day', 'create')
            ->notEmpty('day');

        $validator
            ->requirePresence('hour', 'create')
            ->notEmpty('hour');

        $validator
            ->allowEmpty('note');

        return $validator;
    }

    /**
     * Default beforeMarshal.
     *
     * @param Event $event, ArrayObject $data, ArrayObject $options.
     * @return null
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        
        // Alterando o formato da data da consulta
        if(isset($data['day_submit']) && empty($data['day_submit'])){
            $aux = "";
            $aux = $data['day'];
            $data['day'] = $data['day_submit'];
            $data['day_submit'] = $aux;
        }
        
        $data['day'] = str_replace('/', '-', $data['day_submit']);
        $day = new Date($data['day']);
        $day->setTimezone(new \DateTimeZone('America/New_York'));
       
        $data['day'] = $day;

        // pr($data);die;


        // Verificando qual é a unidade mais próxima que possua a especialidade escolhida
        $units = TableRegistry::get('Units');
        $units = $units->find('all')
                 ->join(['us' =>['table' => 'units_specialties','type' => 'INNER','conditions' => 'us.unit_id = units.id',]])
                 ->where(['us.specialty_id' => $data['specialty_id']])
                 ->toArray();

        $user = TableRegistry::get('Users');
        $user = $user->get($data['user_id']);

        $latitudeUser = $user['latitude'];
        $longitudeUser = $user['longitude'];

        $unitIDShort = null;
        $distanceAux = PHP_INT_MAX;   

        foreach($units as $unit){

            // pr($unit['name']);
           $latitudeUnit = str_replace(",", ".",$unit['latitude']); 
           $longitudeUnit = str_replace(",", ".",$unit['longitude']); 
           $distance = $this->distance($latitudeUser,$longitudeUser,$latitudeUnit,$longitudeUnit);

           if($distance < $distanceAux){
               Log::write('info','USF - ' . $unit['name'] . ' está a ' . $distance . " km de distância do Usuário " . $data['user_id']);
               $distanceAux = $distance;
               $unitIDShort = $unit['id'];
           }

        }
        $data['unit_id'] = $unitIDShort;
        // pr($data);
        // die;

    }

    /*Fórmula de Haversine
    a = sin²(Δφ/2) + cos φ1 * cos φ2 * sin²(Δλ/2) -> (φ1) = LATITUDE 1, (φ2) = LATITUDE 2 -> (Δφ) = (φ2 - φ1) / 
    c = 2 ⋅ atan2( √a, √(1−a) )
    d = R * c -> R = raio da terra = 6.371
    */
    function distance($lat1, $long1, $lat2, $long2)
    {
        $dlat = deg2rad($lat2-$lat1);
        $dlong = deg2rad($long2-$long1);
        
        // pr("dlat: " . $dlat);
        // pr("dlong: " .$dlong);
        // pr("lat1: " .$lat1);
        // pr("long1: " .$long1);
        // pr("lat2: " .$lat2);
        // pr("long2: " .$long2);
        $a = (sin($dlat/2.0) * sin($dlat/2.0)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * (sin($dlong/2.0) * sin($dlong/2.0));
        // die;
        $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));
        $d = 6371 * $c;
        // pr("a: " .$a);
        // pr("c: " .$c);
        // pr("d: " .$d);
        // echo "<br>";

        return $d;
    }


    public function afterSave($created, $options = array()){
        // if ($created) {
        //     $event = new Event('Model.Consultation.created', $this, $options);
        //     $this->eventManager()->dispatch($event);
        // }
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
        $rules->add($rules->existsIn(['specialty_id'], 'Specialties'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['status_id'], 'StatusConsultations'));
        $rules->add($rules->existsIn(['district_id'], 'Districts'));
        return $rules;
    }
}
