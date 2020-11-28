<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\User;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

     public static $title;

     public $breed = [
        'Preta'     => 'Preta',
        'Branca'    => 'Branca',
        'Parda'     => 'Parda',
        'Amarela'   => 'Amarela',
        'Indígena'  => 'Indígena'
    ];

    public $sexual_orientation = [
        'Heterossexual' => 'Heterossexual',
        'Lésbica'       => 'Lésbica',
        'Travesti'      => 'Travesti',
        'Gay'           => 'Gay',
        'Bissexual'     => 'Bissexual',
        'Transsexual'   => 'Transsexual',
        'Outro'         => 'Outro'
    ];
    public $deficiency_type = [
        'Auditiva'              => 'Auditiva',
        'Visual'                => 'Visual',
        'Física'                => 'Física',
        'Intelectual/Cognitiva' => 'Intelectual/Cognitiva',
        'Outro'                 => 'Outro'
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        // die;
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Consultations',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
        $this->loadComponent('Cookie', ['expires' => '2 days']);

        // $this->Auth->allow(['add', 'logout', 'forgotPassword', 'resetPassword']);
        $this->Auth->allow(['return_cities_state','getLatitudeLongitudeByAddress']);

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if($this->Auth->user()){
            $this->set('authUser', $this->Auth->user());
        }

    }


    /**
     * Return all states and all cities from Brazil.
     *
     * @param null.
     * @return Array (Json) with all states and cities
     */
    public function states_cities(){
      $content = file_get_contents(ROOT . '\webroot\js\states_cities\estados-cidades.json');
      // pr($content);die;
      return $content;
    }


    /**
     * Return all states from Brazil.
     *
     * @param null.
     * @return Array with all states from Brazil
     */
    public function return_states(){
        $states = array();
        $states_cities = json_decode($this->states_cities());

        foreach ($states_cities->estados as $index => $state) {
            $states[$state->sigla] = $state->nome;
        }

        return $states;
    }


    /**
     * Return all cities from State.
     *
     * @param $state.
     * @return Array with all cities from State
     */
    public function return_cities($stateReturnCities){
        $cities = array();
        $states_cities = json_decode($this->states_cities());

        foreach ($states_cities->estados as $index => $state) {
            if($state->sigla == strtoupper($stateReturnCities)){
                // $cities = $state->cidades;
                foreach ($state->cidades as $city) {
                    $cities[$city] = $city;
                }
                break;
            }
        }

        return $cities;
    }

    /**
     * Return message with all errors.
     *
     * @param Array $errors.
     * @return String $message
     */
    public function return_message_errors($errors){
      $message = "<ul>";
        foreach ($errors as $key => $value) {
          foreach ($value as $v) {
            $message .= " <li> " . $key . ' - ' . $v['message'] . " </li> ";
          }
        }
        $message .= "</ul>";
        return $message;
    }

    public function createCookie($name, $content){
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        setcookie($name, serialize($content), time()+86400, '/', $domain, false);
    }

    function destroyCookie($name){
        unset($_COOKIE[$name]);
    }
}
