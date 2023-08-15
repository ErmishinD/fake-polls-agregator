<?php 

namespace App\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Symfony\Component\Routing\RouteCollection;

class PollController extends BaseController
{
	public function index(RouteCollection $routes) {
        if (! isset($_SESSION)) {
            session_start();
        }

        $polls = Poll::query()
            ->where('user_id', $_SESSION['user_id'])
            ->when(isset($_GET['sort']), function($query) {
                $query->orderBy($_GET['sort']['field'], $_GET['sort']['type']);
            })
            ->get();
        $this->renderView($routes, 'polls/index', ['polls' => $polls]);
	}

    public function create(RouteCollection $routes) {
        $this->renderView($routes, 'polls/create');
    }
    
    public function store(RouteCollection $routes) {
        if (! isset($_SESSION)) {
            session_start();
        }

        $poll = Poll::create([
            'title' => $_POST['title'],
            'status' => $_POST['status'],
            'user_id' => $_SESSION['user_id'],
        ]);

        if (isset($_POST['poll_option_texts'])) {
            $poll_options_data = [];
            for ($i=0; $i < count($_POST['poll_option_texts']); $i++) {
                $poll_options_data[] = [
                    'poll_id' => $poll->id,
                    'text' => $_POST['poll_option_texts'][$i],
                    'votes_count' => $_POST['poll_option_votes_count'][$i],
                ];
            }
            PollOption::insert($poll_options_data);
        }

        $this->redirect($routes, 'polls.index');
    }

    public function show(RouteCollection $routes, int $id) {
        $poll = Poll::with('poll_options')->find($id);
        $this->renderView($routes, 'polls/show', ['poll' => $poll]);
    }

    public function edit(RouteCollection $routes, int $id) {
        $poll = Poll::with('poll_options')->find($id);
        $this->renderView($routes, 'polls/edit', ['poll' => $poll]);
    }

    public function update(RouteCollection $routes, int $id) {
        $poll = Poll::find($id);
        $poll->update([
            'title' => $_POST['title'],
            'status' => $_POST['status'],
        ]);

        PollOption::where('poll_id', $poll->id)->delete();

        if (isset($_POST['poll_option_texts'])) {
            $poll_options_data = [];
            for ($i=0; $i < count($_POST['poll_option_texts']); $i++) {
                $poll_options_data[] = [
                    'poll_id' => $poll->id,
                    'text' => $_POST['poll_option_texts'][$i],
                    'votes_count' => $_POST['poll_option_votes_count'][$i],
                ];
            }
            PollOption::insert($poll_options_data);
        }

        $this->redirect($routes, 'polls.index');
    }

    public function destroy(RouteCollection $routes, int $id) {
        Poll::where('id', $id)->delete();
        
        $this->redirect($routes, 'polls.index');
    }
}