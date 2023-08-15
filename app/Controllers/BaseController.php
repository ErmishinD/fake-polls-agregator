<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BaseController
{
	public function renderView(RouteCollection $routes, $view, $variables=[]) {
        extract($variables);

        require_once APP_ROOT . '/views//'.$view.'.php';
	}

    public function redirect(RouteCollection $routes, $routeName) {
        $response = new RedirectResponse($routes->get($routeName)->getPath());
        $response->send();
    }
}