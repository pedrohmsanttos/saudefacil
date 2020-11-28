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
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\I18n\Date;
use Cake\I18n\FrozenDate;

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

    public $responsible = [
        '1' => 'Sim', 
        '0' => 'Não'
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
        // Type::build('datetime')->useLocaleParser();
        // Configure a custom datetime format parser format.
        // Time::$setDefaultLocale = 'pt-BR';


        // Date::setToStringFormat('dd-MM-YYYY');
        // FrozenDate::setToStringFormat('dd-MM-YYYY');

        // Type::build('date')
        //     ->useImmutable()
        //     ->useLocaleParser()
        //     ->setLocaleFormat('dd-MM-YYYY');



        Type::build('datetime')->useLocaleParser()->setLocaleFormat('dd/MM/YYYY H:i:s');
        Type::build('date')->useLocaleParser()->setLocaleFormat('dd/MM/YYYY');
        // Time::setToStringFormat('dd-MM-YYYY HH:mm:ss');
        // pr(Time::setToStringFormat('dd-MM-YYYY HH:mm:ss'));
        // Type::build('datetime')->useLocaleParser()->setFormat('dd/MM/YYYY H:i:s');
            
            // pr(Type::build('datetime')->useLocaleParser());
            // pr(Type::build('date'));

            // die;
        // Time::$defaultLocale = 'pt-BR';
        // Time::setToStringFormat('dd/MM/YYYY');

        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
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


        $this->set('color', 'pink');

    }
}
