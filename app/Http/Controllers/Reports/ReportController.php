<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskListRequest;

use App\Enum\TaskStatus;
use App\Models\User;
use App\Services\Reports\ReportService;

class ReportController extends Controller {

    protected $objReportService;
    public function __construct(ReportService $insReportService){

        $this->objReportService = $insReportService;
    }

    public function index(){

        $statuses = TaskStatus::cases();
        $listOfActiveUsers = User::where('active', 1)->get();

        return view('Reports.task_report', compact( 'statuses', 'listOfActiveUsers'));
    }

    public function generateReport(TaskListRequest $request){

        return $this->objReportService->generate($request);
    }

}
