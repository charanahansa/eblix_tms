<?php

namespace App\Services\Reports;

class HtmlContentGeneratorService {

    public function generateContent($data){

        $tableBody = $this->getTableBody($data['listofTask']);
        $imagePath = public_path('images.jpg');

        $htmlContent = '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>PDF Example</title>
                                <style>

                                    body {
                                        font-family: "Consolas", monospace;
                                        margin: 0;
                                        padding: 0;
                                    }

                                    .container {
                                        width: 100%;
                                        padding: 15px;
                                        margin: auto;
                                    }

                                    .text-center {
                                        text-align: center;
                                    }

                                    .text-primary {
                                        color: #007bff;
                                    }

                                    .lead {
                                        font-size: 1.25rem;
                                    }

                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }

                                    table, th, td {
                                        border: 1px solid black;
                                    }
                                    th {
                                        background-color: yellow;
                                    }

                                </style>
                            </head>
                            <body>
                                <div class="container">
                                    <table style="background-color : #ffffff; border: 1px solid white;">
                                        <tr style="background-color : #ffffff; border: 1px solid white;">
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid white;"></th>
                                            <th style="width: 40%; background-color : #ffffff; border: 1px solid white;">
                                                <h1 class="text-center text-primary">Task List</h1>
                                            </th>
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid white;">
                                                <img src="' . $imagePath . '" alt="My Image" style="max-width: 100%; height: auto;"/>
                                            </th>
                                        </tr>
                                    </table>

                                    <h4>' . $data['reportCriteria'] . '</h4>

                                    <table>
                                        <thead>
                                            <tr>
                                                <td style="width: 10%;">Task ID</td>
                                                <td style="width: 15%;">Date</td>
                                                <td style="width: 40%;">Title</td>
                                                <td style="width: 15%;">Due Date</td>
                                                <td style="width: 10%;">User</td>
                                                <td style="width: 10%;">Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ' . $tableBody . '
                                        </tbody>
                                    </table>
                                </div>
                            </body>
                            </html>';


        return $htmlContent;
    }

    private function getTableBody($listOfTask){

        $tableBody = '';
        foreach($listOfTask as $row => $value){

            $tableBody .= ' <tr>
                                <td style="width: 10%;"> ' . $value->id . ' </td>
                                <td style="width: 15%;"> ' . $value->task_date->format('Y-m-d') . ' </td>
                                <td style="width: 40%;"> ' . $value->title . ' </td>
                                <td style="width: 15%;"> ' . $value->due_date->format('Y-m-d') . ' </td>
                                <td style="width: 10%;"> ' . $value->user->name . ' </td>
                                <td style="width: 10%;"> ' .  ucfirst($value->status_id)  . ' </td>
                            </tr> ';
        }

        return $tableBody;
    }

}
