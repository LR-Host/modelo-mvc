<?php

/**
 * Services are globally registered in this file
 */
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * Registering a router
 */
$di['router'] = function () {
    $router = new Router();
    $router->setDefaultModule("frontend");
    //$router->setDefaultNamespace("Lrhost\Frontend\Controllers");
    //Using an array
    
    $router->add("/painel", array(
        'module' => 'painel',
        'controller' => 'admin',
        'action' => 'index',
    ));

    $router->add("/painel/:controller/:action", array(
        'module' => 'painel',
        'controller' => 1,
        'action' => 2,
    ));
    $router->add("/", array(
        'controller' => 'index',
        'action' => 'index'
    ));
    $router->setDefaults(array(
        'controller' => 'index',
        'action' => 'index'
    ));

    $router->notFound(array(
        "controller" => "index",
        "action" => "route404"
    ));
    return $router;
};

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di['url'] = function () {
    $url = new UrlResolver();
    $url->setBaseUri('/lrhost/');

    return $url;
};

/**
 * Start the session the first time some component request the session service
 */
$di['session'] = function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
};
