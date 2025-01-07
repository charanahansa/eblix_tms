<?php

namespace App\Services\Tasks;

use App\Repositories\TaskRepository;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class TaskService {

    protected $objTaskRepository;
    public function __construct(TaskRepository $insTaskRepository){

        $this->objTaskRepository = $insTaskRepository;
    }

    public function save($request){

        $tblTask['id'] = $request->task_id;
        $tblTask['task_date'] = Carbon::now()->format('Y-m-d H:i:s');
        $tblTask['title'] = $request->title;
        $tblTask['description'] = $request->description;
        $tblTask['due_date'] = $request->due_date;
        $tblTask['user_id'] = Auth::user()->id;
        $tblTask['status_id'] = $request->status_id;

        return $this->objTaskRepository->save($tblTask);
    }

    public function findById($taskId){

        return $this->objTaskRepository->findById($taskId);
    }

    public function getAll(){

        return $this->objTaskRepository->getAll();
    }

}
