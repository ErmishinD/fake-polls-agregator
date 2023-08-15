<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('home', new Route('/', ['controller' => 'HomeController', 'method' => 'index'], [], methods: ['GET']));

$routes->add('login', new Route('/login', ['controller' => 'AuthController', 'method' => 'login'], [], methods: ['GET']));
$routes->add('perform_login', new Route('/login', ['controller' => 'AuthController', 'method' => 'perform_login'], [], methods: ['POST']));
$routes->add('register', new Route('/register', ['controller' => 'AuthController', 'method' => 'register'], [], methods: ['GET']));
$routes->add('perform_register', new Route('/register', ['controller' => 'AuthController', 'method' => 'perform_register'], [], methods: ['POST']));
$routes->add('logout', new Route('/logout', ['controller' => 'AuthController', 'method' => 'logout'], [], methods: ['POST']));

$routes->add('polls.index', new Route('/polls', ['controller' => 'PollController', 'method' => 'index'], [], methods: ['GET']));
$routes->add('polls.create', new Route('/polls/create', ['controller' => 'PollController', 'method' => 'create'], [], methods: ['GET']));
$routes->add('polls.store', new Route('/polls/create', ['controller' => 'PollController', 'method' => 'store'], [], methods: ['POST']));
$routes->add('polls.show', new Route('/polls/{id}', ['controller' => 'PollController', 'method' => 'show'], ['id' => '[0-9]+'], methods: ['GET']));
$routes->add('polls.edit', new Route('/polls/{id}/edit', ['controller' => 'PollController', 'method' => 'edit'], ['id' => '[0-9]+'], methods: ['GET']));
$routes->add('polls.update', new Route('/polls/{id}/edit', ['controller' => 'PollController', 'method' => 'update'], ['id' => '[0-9]+'], methods: ['POST']));
$routes->add('polls.delete', new Route('/polls/{id}/delete', ['controller' => 'PollController', 'method' => 'destroy'], ['id' => '[0-9]+'], methods: ['POST']));

$routes->add('api.polls.random', new Route('/api/polls/random', ['controller' => 'Api\\PollController', 'method' => 'random_poll'], methods: ['GET']));