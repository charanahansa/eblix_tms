<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\Enum\TaskStatus;
use App\Models\Task;
use App\Services\Tasks\TaskService;

use Carbon\Carbon;

class TaskController extends Controller {

    protected $objTaskService;
    public function __construct(TaskService $insTaskService){

        $this->objTaskService = $insTaskService;
    }

    public function index(){

        if (session()->has('success')) {
            session()->forget('success');
        }

        $task = new Task();
        $statuses = TaskStatus::cases();
        return view('Tasks.Task', compact('task', 'statuses'));
    }

    public function saveTask(TaskRequest $request){

        $task = $this->objTaskService->save($request);
        $task->due_date = Carbon::parse($task->due_date)->format('Y/m/d');

        $statuses = TaskStatus::cases();

        session()->flash('success', 'Task created successfully!');
        return view('Tasks.Task', compact('task', 'statuses'));
    }

}
