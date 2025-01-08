@extends('layouts.tms')

@section('title')
    Task List
@endsection
@section('body')

<div class="container-fluid mt-3">
    <form method="post"  action="{{route('task.list.search')}}">

        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        Task List
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-12 col-md-12">

                                <div class="row mb-2">
                                    <label for="from_date" class="col-1 col-form-label-sm">From Date</label>
                                    <div class="col-2">
                                        <input type="date" name="from_date" id="from_date" class="form-control form-control-sm @error('from_date') is-invalid @enderror"  value="{{ old('from_date')}}">
                                        @error('from_date')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="to_date" class="col-1 col-form-label-sm">To Date</label>
                                    <div class="col-2">
                                        <input type="date" name="to_date" id="to_date" class="form-control form-control-sm @error('to_date') is-invalid @enderror"  value="{{ old('to_date')}}">
                                        @error('to_date')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="title" class="col-1 col-form-label-sm">Title</label>
                                    <div class="col-5">
                                        <input type="text" name="title" id="title" class="form-control form-control-sm"  value="{{ old('title')}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="status_id" class="col-1 col-form-label-sm">Status</label>
                                    <div class="col-2">
                                        <select name="status_id" id="status_id" class="form-select form-select-sm">
                                            @foreach ($statuses as $status): ?>
                                                <option value="{{$status->value}}"> {{ucfirst($status->name)}} </option>
                                            @endforeach
                                            <option value=0 selected> Please Select The Status </option>
                                        </select>
                                    </div>
                                    <label for="status_id" class="col-1 col-form-label-sm">User</label>
                                    <div class="col-2">
                                        <select name="status_id" id="status_id" class="form-select form-select-sm">
                                            @foreach ($listOfActiveUsers as $user): ?>
                                                <option value="{{$user->id}}"> {{ucfirst($user->name)}} </option>
                                            @endforeach
                                            <option value=0 selected> Please Select The User </option>
                                        </select>
                                    </div>
                                    <label for="description" class="col-1 col-form-label-sm">Description</label>
                                    <div class="col-5">
                                        <input type="text" name="description" id="description" class="form-control form-control-sm"  value="{{ old('description')}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="" class="col-10 col-form-label-sm"></label>
                                    <div class="col-2">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm w-100" value="Search">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">Task ID</th>
                                                <th style="width: 10%;">Date</th>
                                                <th style="width: 50%;">Title</th>
                                                <th style="width: 10%;">Due Date</th>
                                                <th style="width: 10%;">User</th>
                                                <th style="width: 10%;">Status</th>
                                                <th style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listOfTask as $rowKey => $rowValue)
                                                <tr>
                                                    <td style="width: 5%;">{{$rowValue->id}}</td>
                                                    <td style="width: 10%;">{{$rowValue->task_date->format('Y-m-d')}}</td>
                                                    <td style="width: 50%;">{{$rowValue->title}}</td>
                                                    <td style="width: 10%;">{{$rowValue->due_date->format('Y-m-d')}}</td>
                                                    <td style="width: 10%;">{{$rowValue->user->name}}</td>
                                                    <td style="width: 10%;">{{ ucfirst($rowValue->status_id) }}</td>
                                                    <td style="width: 10%;">
                                                        <a href="{{ route('task.open', $rowValue->id) }}" class="btn btn-primary btn-sm w-100">Open</a>
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

    </form>
</div>

@endsection
