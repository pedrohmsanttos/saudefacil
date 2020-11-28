<?php

namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;
use Cake\ORM\TableRegistry;

class ConsultationListener implements EventListenerInterface {

    public function implementedEvents() {
        return array(
            'Model.Consultation.created' => 'updateUnitConsultation',
        );
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
        
        $a = (sin($dlat/2.0) * sin($dlat/2.0)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * (sin($dlong/2.0) * sin($dlong/2.0));
        $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));
        $d = 6371 * $c;
        
        return $d;
    }


    public function updateUnitConsultation($event,  $entity, $options) {
        
         $units = TableRegistry::get('Units');
         $units = $units->find('all')
                  ->join(['us' =>['table' => 'units_specialties','type' => 'INNER','conditions' => 'us.unit_id = units.id',]])
                  ->where(['us.specialty_id' => $event->data['specialty_id']])
                  ->toArray();

         $user = TableRegistry::get('Users');
         $user = $user->get($event->data['user_id']);

         $latitudeUser = $user['latitude'];
         $longitudeUser = $user['longitude'];

         $unitIDShort = null;
         $distanceAux = PHP_INT_MAX;   

         foreach($units as $unit){
            $latitudeUnit = str_replace(",", ".",$unit['latitude']); 
            $longitudeUnit = str_replace(",", ".",$unit['longitude']); 
            $distance = $this->distance($latitudeUser,$longitudeUser,$latitudeUnit,$longitudeUnit);

            if($distance < $distanceAux){
                Log::write('info','USF - ' . $unit['name'] . ' está a ' . $distance . " km de distância do Usuário " . $event->data['user_id']);
                $distanceAux = $distance;
                $unitIDShort = $unit['id'];
            }

         }
            die('oi');
         $event->data['unit_id'] = $unitIDShort;
         $entity->save($event->data);
         

    }

    
}