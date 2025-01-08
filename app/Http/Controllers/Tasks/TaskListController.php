<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskListRequest;

use App\Enum\TaskStatus;
use App\Repositories\TaskRepository;
use App\Services\Tasks\TaskListService;
use App\Models\User;

class TaskListController extends Controller {

    protected $objTaskRepository;
    protected $objTaskListService;
    public function __construct(TaskRepository $insTaskRepository, TaskListService $insTaskListService){

        $this->objTaskRepository = $insTaskRepository;
        $this->objTaskListService = $insTaskListService;
    }

    public function getTaskList(){

        $statuses = TaskStatus::cases();
        $listOfActiveUsers = User::where('active', 1)->get();
        $listOfTask = $this->objTaskRepository->getAll();

        return view('Tasks.TaskList', compact('listOfTask', 'statuses', 'listOfActiveUsers'));
    }

    public function searchTaskList(TaskListRequest $request){

        $statuses = TaskStatus::cases();
        $listOfActiveUsers = User::where('active', 1)->get();

        $listOfTask = $this->objTaskListService->generateReport($request);


        return view('Tasks.TaskList', compact('listOfTask', 'statuses', 'listOfActiveUsers'));
    }

}
