<?php

namespace App\Repositories;

use App\Contracts\EntityInterface;
use App\Contracts\TransactionInterface;

use App\Models\Task;
class TaskRepository implements EntityInterface, TransactionInterface {

    public function save($tblTask){

        $savedTask = Task::updateOrCreate(
                            ['id' => $tblTask['id'] ],
                            $tblTask
                        );

        return $savedTask;
    }

    public function delete($taskId){

        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
            return true;
        }

        return false;
    }

    public function findById($id) {

        return Task::find($id);
    }

    public function getAll() {

        return Task::all();
    }

    public function getTransactions($fromDate, $toDate){

        return Task::whereBetween('task_date', [$fromDate, $toDate])->get();
    }

    public function query(){

        return Task::query();
    }

}
