<?php

namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;
use Cake\ORM\TableRegistry;

class UserListener implements EventListenerInterface {

    public function implementedEvents() {
        return array(
            'Model.User.updateLocalUser' => 'updateLocalUser',
        );
    }

    public function getLatitudeLongitudeByAddress($user){
        $address = (!empty($user['number_address'])) ? $user['number_address'] . " " : "";
        $address .= (!empty($user['address'])) ? $user['address'] . " " : "";
        $address .= (!empty($user['district_address'])) ? $user['district_address'] . " " : "" ;
        $address .= (!empty($user['city_address'])) ? $user['city_address'] . " " : "";
        $address .= (!empty($user['state_address'])) ? $user['state_address'] : "";
        $address = htmlentities(urlencode($address));
        
        if(!empty($address)){
            $content_gmaps = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyCZQoG3hICXoodL_tn1IpX3bxtgiHFUpoA");
            $latitude = json_decode($content_gmaps, false)->results['0']->geometry->location->lat;
            $longitude = json_decode($content_gmaps, false)->results['0']->geometry->location->lng;
           
            return array('latitude' => $latitude, 'longitude' => $longitude);
        }else{
            return null;
        }
    }

    public function updateLocalUser($event,  $entity) {
        $users = TableRegistry::get('Users');
        
        if(isset($entity['id'])){
            $updateUser = $users->get($entity['id']);
        }else{
            $updateUser = $users->get($event->data->id);
        }
        // pr($updateUser);die;

        
        if(empty($updateUser['latitude']) && empty($updateUser['longitude'])){
            // pr($updateUser['longitude']);die;
            
            $localUser = $this->getLatitudeLongitudeByAddress($updateUser);
            if(!is_null($localUser)){
                // $localUser = $this->getLatitudeLongitudeByAddress($entity);
                // $updateUser->latitude = $localUser['latitude'];  
                // $updateUser->longitude = $localUser['longitude'];  
                
                $updateUser['latitude'] = $localUser['latitude'];  
                $updateUser['longitude'] = $localUser['longitude'];  
                $users->save($updateUser);

            }
        }else{
            return true;
        }

    }
}