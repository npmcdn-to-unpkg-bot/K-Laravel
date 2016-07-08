<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Task;
use App\Repositories\TaskRepository;

class TasksContorller extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;

        parent::__construct();
    }


    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function show($id)
    {

        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task','results'));
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        $task = $this->user->publish(
            new Task($request->all())
        );

        return redirect('tasks/'.$task->id);
        
    }

    /**
     * Edit an existing task
     *
     * @param  integer $id
     * @return Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    /**
     * update an existing task
     *
     * @param  integer $id
     * @param  TaskRequest $request
     * @return Response
     */
    public function update($id, TaskRequest $request)
    {
        $task = Task::findOrFail($id);

        $task->update($request->all());

        return redirect('tasks/'.$task->id);
    }

    
    /**

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $tasks)
    {
        $this->authorize('destroy', $tasks);

        $tasks->delete();

        return redirect('/tasks');
    }
}
