@extends('layouts.tms')
@section('title')
    Dashboard
@endsection
@section('body')

<div class="container-fluid mt-3">

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    My Task
                </div>

                <div class="card-body">

                    <h2 class="text-primary mb-2"> My Task </h2>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Task ID</th>
                                            <th style="width: 10%;">Date</th>
                                            <th style="width: 40%;">Title</th>
                                            <th style="width: 10%;">Due Date</th>
                                            <th style="width: 10%;">User</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 10%;"></th>
                                            <th style="width: 10%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listOfTask as $rowKey => $rowValue)
                                            <tr>
                                                <td style="width: 5%;">{{$rowValue->id}}</td>
                                                <td style="width: 10%;">{{$rowValue->task_date->format('Y-m-d')}}</td>
                                                <td style="width: 40%;">{{$rowValue->title}}</td>
                                                <td style="width: 10%;">{{$rowValue->due_date->format('Y-m-d')}}</td>
                                                <td style="width: 10%;">{{$rowValue->user->name}}</td>
                                                <td style="width: 10%;">{{ ucfirst($rowValue->status_id) }}</td>
                                                <td style="width: 10%;">
                                                    <a href="{{ route('task.open', $rowValue->id) }}" class="btn btn-primary btn-sm w-100">Open</a>
                                                </td>
                                                <td style="width: 10%;">
                                                    <a href="{{ route('task.pdf', $rowValue->id) }}" class="btn btn-danger btn-sm w-100">PDF</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
