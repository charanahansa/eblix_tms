<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskListRequest;

use App\Enum\TaskStatus;
use App\Repositories\TaskRepository;
use App\Services\Tasks\TaskListService;
use App\Services\Tasks\SinglePdfGeneratorService;
use App\Models\User;

use PDF;

class TaskListController extends Controller {

    protected $objTaskRepository;
    protected $objTaskListService;
    protected $objSinglePdfGeneratorService;
    public function __construct(TaskRepository $insTaskRepository, TaskListService $insTaskListService, SinglePdfGeneratorService $insSinglePdfGeneratorService){

        $this->objTaskRepository = $insTaskRepository;
        $this->objTaskListService = $insTaskListService;
        $this->objSinglePdfGeneratorService = $insSinglePdfGeneratorService;
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

        $listOfTask = $this->objTaskListService->generateList($request);

        return view('Tasks.TaskList', compact('listOfTask', 'statuses', 'listOfActiveUsers'));
    }

    public function openTask($taskId){

        if (session()->has('success')) {
            session()->forget('success');
        }

        $task = $this->objTaskRepository->findById($taskId);
        $statuses = TaskStatus::cases();
        return view('Tasks.Task', compact('task', 'statuses'));
    }

    public function pdfTask($taskId){

        $task = $this->objTaskRepository->findById($taskId);
        $htmlContent = $this->objSinglePdfGeneratorService->generate($task);

        $pdf = PDF::loadHTML($htmlContent)->setPaper('A4', 'landscape');

        // Download the PDF
        return $pdf->download($taskId.'.pdf');
    }

    public function getAuthenticatedUserTasks(){

        return $this->objTaskListService->generateAuthenticatedUserTasks();
    }

}
