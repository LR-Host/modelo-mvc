<?php

namespace Lrhost\Painel;

use Phalcon\Loader,
Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface {

    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders() {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Lrhost\Painel\Controllers' => __DIR__ . '/controllers/',
            'Lrhost\Painel\Models' => __DIR__ . '/models/',
        ));

        $loader->register();
    }

    /**
     * Registers the module-only services
     *
     * @param Phalcon\DI $di
     */
    public function registerServices($di) {

        /**
         * Read configuration
         */
        $config = include __DIR__ . "/config/config.php";

        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');

            return $view;
        };

        $di->set('dispatcher', function() use ($di) {
   //Obtain the standard eventsManager from the DI
    $eventsManager = $di->getShared('eventsManager');

    //Instantiate the Security plugin
    $security = new Security($di);

    //Listen for events produced in the dispatcher using the Security plugin
    $eventsManager->attach('dispatch', $security);

            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Lrhost\Painel\Controllers');
            return $dispatcher;
        });

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            return new DbAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->name
            ));
        };
    }

}
