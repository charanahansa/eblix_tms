<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Repositories\TaskRepository;

use Carbon\Carbon;

class TaskListService {

    protected $objTaskRepository;
    public function __construct(TaskRepository $insTaskRepository){

        $this->objTaskRepository = $insTaskRepository;
    }

    public function generateReport($request){

        $dtFromDate = Carbon::parse($request->from_date)->startOfDay();
        $dtToDate = Carbon::parse($request->to_date)->endOfDay();

        $lstTaskList = $this->objTaskRepository->query();

        if ($request->filled('from_date')) {
            $lstTaskList->whereDate('task_date', '>=', $dtFromDate);
        }

        if ($request->filled('to_date')) {
            $lstTaskList->whereDate('task_date', '<=', $dtToDate);
        }

        if ($request->filled('title')) {
            $lstTaskList->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('status_id') && $request->status_id != 0) {
            $lstTaskList->where('status_id', $request->status_id);
        }

        if ($request->filled('status_id') && $request->status_id != 0) {
            $lstTaskList->where('user_id', $request->status_id); // You should check the parameter's name for user_id
        }

        if ($request->filled('description')) {
            $lstTaskList->where('description', 'like', '%' . $request->description . '%');
        }

        $listOfTask = $lstTaskList->get();

        return $listOfTask;
    }

}
