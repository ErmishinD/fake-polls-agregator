<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Poll;
use App\Models\User;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Response;

class PollController extends BaseController {
    public function random_poll(RouteCollection $routes) {
        if (! isset($_SERVER['HTTP_AUTH_TOKEN'])) {
            $response = new Response(json_encode(['message' => 'There is no Auth-Token http header in your request']),
                Response::HTTP_BAD_REQUEST,
                ['content-type' => 'application/json']
            );
            return $response->send();
        }

        $user = User::where('api_key', $_SERVER['HTTP_AUTH_TOKEN'])->first();
        if (is_null($user)) {
            $response = new Response(json_encode(['message' => 'Your Auth-Token is invalid']),
                Response::HTTP_UNAUTHORIZED,
                ['content-type' => 'application/json']
            );
            return $response->send();
        }

        $poll = Poll::with('poll_options')->inRandomOrder()->where('user_id', $user->id)->first();

        $response = new Response(json_encode([
                'data' => [
                    'title' => $poll->title,
                    'poll_options' => $poll->poll_options->map(function($poll_option) {
                        return [
                            'text' => $poll_option->text,
                            'votes_count' => $poll_option->votes_count
                        ];
                    })
                ]
            ]),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        $response->send();
    }
	
}