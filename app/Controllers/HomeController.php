<?php 

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class HomeController extends BaseController
{
	public function index(RouteCollection $routes)
	{
		session_start();

		$user = User::find($_SESSION['user_id']);

        $this->renderView($routes, 'index', ['user' => $user]);
	}
}