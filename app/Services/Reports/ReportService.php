<?php

namespace App\Services\Reports;

use PDF;

use App\Services\Tasks\TaskListService;
use App\Services\Reports\HtmlContentGeneratorService;
class ReportService {

    protected $objTaskListService;
    protected $objHtmlContentGenerator;
    public function __construct(TaskListService $insTaskListService, HtmlContentGeneratorService $intHtmlContentGeneratorService){

        $this->objTaskListService = $insTaskListService;
        $this->objHtmlContentGenerator = $intHtmlContentGeneratorService;
    }

    public function generate($request){

        $data = $this->objTaskListService->generateList($request, true);
        $htmlContent =  $this->objHtmlContentGenerator->generateContent($data);

        $pdf = PDF::loadHTML($htmlContent)->setPaper('A4', 'landscape');

        // Download the PDF
        return $pdf->download('TaskListReport.pdf');
    }

}
