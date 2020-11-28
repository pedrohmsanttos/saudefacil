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
namespace App\Controller\Admin;

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

    public $role = [
        'Suporte'        => 'Suporte',
        'Administrador'  => 'Administrador',
        'Usuário Comum'  => 'Usuário Comum'
    ];

    public $rpas = [
        '1' => 'RPA 1',
        '2' => 'RPA 2',
        '3' => 'RPA 3',
        '4' => 'RPA 4',
        '5' => 'RPA 5',
        '6' => 'RPA 6'
    ];

    public $days = [
      'Segunda-feira' =>  'Segunda-feira',
      'Terça-feira'   =>  'Terça-feira',
      'Quarta-feira'  =>  'Quarta-feira',
      'Quinta-feira'  =>  'Quinta-feira',
      'Sexta-feira'   =>  'Sexta-feira',
      'Sábado'        =>  'Sábado'
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
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Admins'
                ],
            ],
            'loginRedirect' => [
                'controller' => 'Admins',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Admins',
                'action' => 'login'
            ]
        ]);

        // $this->Auth->allow(['add', 'logout', 'forgotPassword', 'resetPassword']);

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
}
