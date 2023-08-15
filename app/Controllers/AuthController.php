<?php 

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class AuthController extends BaseController
{
	public function login(RouteCollection $routes) {
        $this->renderView($routes, 'auth/login');
	}

    public function perform_login(RouteCollection $routes) {
        session_start();

        $user = User::where('email', $_POST['email'])->first();

        if (! is_null($user) && $user->password == hash('md5', $_POST['password'])) {
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user->id;

            $this->redirect($routes, 'polls.index');
        }

        $_SESSION['error_message'] = 'The credentials are wrong!';

        $this->redirect($routes, 'login');
    }

    public function logout(RouteCollection $routes) {
        session_start();

        $_SESSION['auth'] = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['error_message']);

        $this->redirect($routes, 'login');
    }

    public function register(RouteCollection $routes) {
        $this->renderView($routes, 'auth/register');
    }

    public function perform_register(RouteCollection $routes) {
        session_start();

        $user = User::where('email', $_POST['email'])->first();
        if (! is_null($user)) {
            $_SESSION['error_message'] = 'User with this email already exists!';
            $this->redirect($routes, 'register');
        }

        $api_key_length = 20;
        $api_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($api_key_length/strlen($x)) )),1,$api_key_length);

        $user = User::create([
            'email' => $_POST['email'],
            'password' => hash('md5', $_POST['password']),
            'api_key' => $api_key,
        ]);

        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $user->id;

        $this->redirect($routes, 'polls.index');
    }
}