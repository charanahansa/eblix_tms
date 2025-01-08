<?php

namespace App\Services\Tasks;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Repositories\TaskRepository;
use App\Enum\TaskStatus;
use Carbon\Carbon;

class TaskListService {

    protected $objTaskRepository;
    public function __construct(TaskRepository $insTaskRepository){

        $this->objTaskRepository = $insTaskRepository;
    }

    public function generateList($request, $withCriteria = false){

        $dtFromDate = Carbon::parse($request->from_date)->startOfDay();
        $dtToDate = Carbon::parse($request->to_date)->endOfDay();

        $criteria = [];
        $taskList = $this->objTaskRepository->query();

        if ($request->filled('from_date')) {

            $criteria[] = "Date period from " . $dtFromDate->format('Y/m/d');
            $taskList->whereDate('task_date', '>=', $dtFromDate);
        }

        if ($request->filled('to_date')) {

            $criteria[] = "to " . $dtToDate->format('Y/m/d');
            $taskList->whereDate('task_date', '<=', $dtToDate);
        }

        if ($request->filled('title')) {

            $criteria[] = "Title contains '" . $request->title . "'";
            $taskList->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('status_id') && $request->status_id != 0) {

            $criteria[] = "Status is '" . ucfirst(TaskStatus::getValue($request->status_id)) . "'";
            $taskList->where('status_id', $request->status_id);
        }

        if ($request->filled('user_id') && $request->user_id != 0) {

            $user = User::find($request->user_id);
            if ($user) {
                $criteria[] = "Assigned to '" . $user->name . "'";
            }
            $taskList->where('user_id', $request->user_id);
        }

        if ($request->filled('description')) {

            $criteria[] = "Description contains '" . $request->description . "'";
            $taskList->where('description', 'like', '%' . $request->description . '%');
        }

        $reportCriteria = implode(' ', $criteria);
        $listOfTask = $taskList->get();

        if($withCriteria){

            return [
                'listofTask' => $listOfTask,
                'reportCriteria' => $reportCriteria,
            ];
        }

        return $listOfTask;
    }

    public function generateAuthenticatedUserTasks(){

        $listOfAllTask = $this->objTaskRepository->getAll();

        return $listOfAllTask->where('user_id', Auth::user()->id);
    }

}
