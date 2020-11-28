<?php
namespace App\Controller\User;

// use App\Controller\AppController;
use App\Controller\User\AppController;
use Cake\Event\Event;
/**
 * Units Controller
 *
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 *
 * @property \App\Model\Table\UnitsTable $Units
 */
class UnitsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function beforeRender(Event $event)
    {
       parent::beforeRender($event);
       $this->viewBuilder()->helpers(['GoogleMap']);
    }

    public function index()
    {
        $this->set('title', 'Unidades de Saúde');

        if($this->request->is('mobile')){
          die('É O TROINHA CARAI');
        }

        $query = $this->Units->find('all')->contain(['Specialties']);
        $units = $query->toArray();
        $this->set('units', $units);
        // pr($units);die;

    }

    public function units(){
        $this->set('title', 'Unidades de Saúde');
    }
}
