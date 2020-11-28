
<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    Router::prefix('user', function ($routes) {

        $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/cadastro', ['controller' => 'Users', 'action' => 'add']);
        $routes->connect('/esqueci-senha', ['controller' => 'Users', 'action' => 'forgotPassword']);
        $routes->connect('/recuperar-senha', ['controller' => 'Users', 'action' => 'forgotPassword']);
        $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/alterar-senha', ['controller' => 'Users', 'action' => 'alterPassword']);
        $routes->connect('/meus-dados', ['controller' => 'Users', 'action' => 'edit']);
        $routes->connect('/marcar-consulta', ['controller' => 'Consultations', 'action' => 'add']);
        $routes->connect('/minhas-consultas', ['controller' => 'Consultations', 'action' => 'index']);
        $routes->connect('/unidades-de-saude', ['controller' => 'Units', 'action' => 'index']);

        $routes->fallbacks('InflectedRoute');

    });

    Router::prefix('admin', function ($routes) {

        $routes->connect('/', ['controller' => 'Admins', 'action' => 'login']);
        $routes->connect('/unidades-de-saude', ['controller' => 'Units', 'action' => 'index']);
        $routes->connect('/cadastrar-unidade-de-saude', ['controller' => 'Units', 'action' => 'add']);
        $routes->connect('/cadastrar-medico', ['controller' => 'Doctors', 'action' => 'add']);
        $routes->connect('/medicos', ['controller' => 'Doctors', 'action' => 'index']);
        $routes->connect('/cadastrar-usuario', ['controller' => 'Admins', 'action' => 'add']);
        $routes->connect('/usuarios', ['controller' => 'Admins', 'action' => 'index']);
        $routes->connect('/consultas', ['controller' => 'Consultations', 'action' => 'index']);
        $routes->connect('/editar-consulta/*', ['controller' => 'Consultations', 'action' => 'edit']);

        $routes->fallbacks('InflectedRoute');

    });

    Router::prefix('doctor', function ($routes) {

        $routes->connect('/', ['controller' => 'Doctors', 'action' => 'login']);
        $routes->connect('/minha-agenda', ['controller' => 'Doctors', 'action' => 'index']);
        $routes->connect('/consultas', ['controller' => 'Doctors', 'action' => 'getConsultations']);
        $routes->connect('/visualizar/*', ['controller' => 'Consultations', 'action' => 'view']);


        $routes->fallbacks('InflectedRoute');

    });


    Router::prefix('api', function ($routes) {

        $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/add', ['controller' => 'Users', 'action' => 'add']);
        $routes->connect('/edit/*', ['controller' => 'Users', 'action' => 'edit']);
        $routes->connect('/getcitiesbystate', ['controller' => 'Users', 'action' => 'getCitiesByState']);
        $routes->connect('/getspecialties', ['controller' => 'Users', 'action' => 'getSpecialties']);
        $routes->connect('/getconsultations', ['controller' => 'Consultations', 'action' => 'getConsultations']);
        $routes->connect('/getconsultationsdoctor',['controller' =>'Consultations','action' => 'getConsultationsByDoctor']);
        $routes->connect('/consultations/add', ['controller' => 'Consultations', 'action' => 'add']);


        $routes->fallbacks('InflectedRoute');

    });


    $routes->fallbacks('DashedRoute');
});



/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
