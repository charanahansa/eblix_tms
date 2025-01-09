<?php

namespace App\Services\Tasks;

class SinglePdfGeneratorService {

    public function generate($task){

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

                                    .text-start {
                                        text-align: left;
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
                                    <table style="background-color : #ffffff; border: 1px solid black;">
                                        <tr style="background-color : #ffffff; border: 1px solid black;">
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid black;"></th>
                                            <th style="width: 40%; background-color : #ffffff; border: 1px solid black;">
                                                <h1 class="text-center text-primary">Task # '. $task->id .'</h1>
                                            </th>
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid black;">
                                                <img src="' . $imagePath . '" alt="My Image" style="max-width: 100%; height: auto;"/>
                                            </th>
                                        </tr>
                                        <tr style="background-color : #ffffff; border: 1px solid black;">
                                            <th colspan="3" style="width: 30%; background-color : #ffffff; border: 1px solid black;">
                                                <h5 class="text-center text-primary"> '. $task->title .' - '. ucfirst($task->status_id) .' </h5>
                                            </th>
                                        </tr>
                                        <tr style="background-color : #ffffff; border: 1px solid black;">
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid black;">
                                                <p class="text-start text-primary">Task Date : '. $task->task_date->format('Y-m-d') .'</p>
                                            </th>
                                            <th style="width: 40%; background-color : #ffffff; border: 1px solid black;">
                                                <p class="text-start text-primary">Task Due Date : '. $task->due_date->format('Y-m-d') .'</p>
                                            </th>
                                            <th style="width: 30%; background-color : #ffffff; border: 1px solid black;">
                                                <p class="text-start text-primary">User : '. $task->user->name .'</p>
                                            </th>
                                        </tr>
                                        <tr style="background-color : #ffffff; border: 1px solid black;">
                                            <th colspan="3" style="width: 30%; background-color : #ffffff; border: 1px solid black;">
                                                <p class="text-start text-primary"> '. $task->description .' </p>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </body>
                            </html>';

        return $htmlContent;
    }

}
