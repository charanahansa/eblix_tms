@extends('layouts.tms')

@section('title')
    Create Task
@endsection
@section('body')

<div class="container-fluid mt-3">
    <form id="frmTask" method="post">

        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        Create Task
                    </div>

                    <div class="card-body">

                        <div class="row no-gutters">

                            <div class="col-12 col-md-12 col-lg-7 col-xl-7">

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <span>{{ session('success') }}</span>
                                    </div>
                                @elseif( session('danger') )
                                    <div class="alert alert-danger">
                                        <span>{{ session('danger') }}</span>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <span>Please check your inputs</span>
                                    </div>
                                @endif

                                <div class="row mb-2">
                                    <label for="" class="col-7 col-form-label-sm"></label>
                                    <label for="task_id" class="col-2 col-form-label-sm">Task ID</label>
                                    <div class="col-3">
                                        <input type="text" name="task_id" id="task_id" class="form-control form-control-sm @error('task_id') is-invalid @enderror"  value="{{ old('task_id', $task->getTaskId())}}" readonly>
                                        @error('task_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="" class="col-7 col-form-label-sm"></label>
                                    <label for="due_date" class="col-2 col-form-label-sm">Due Date</label>
                                    <div class="col-3">
                                        <input type="date" name="due_date" id="due_date" class="form-control form-control-sm @error('due_date') is-invalid @enderror"  value="{{ old('due_date',  $task->due_date ? $task->due_date->format('Y-m-d') : '' )}}">
                                        @error('due_date')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="title" class="col-2 col-form-label-sm">Title</label>
                                    <div class="col-10">
                                        <input type="text" name="title" id="title" class="form-control form-control-sm @error('title') is-invalid @enderror"  value="{{ old('title', $task->title)}}">
                                        @error('title')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="status_id" class="col-2 col-form-label-sm">Description</label>
                                    <div class="col-10">
                                        <textarea name="description" id="description" class="form-control form-control-sm @error('description') is-invalid @enderror" rows="7" style="resize:none">{{old('description', $task->description)}}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="status_id" class="col-2 col-form-label-sm">Status</label>
                                    <div class="col-4">
                                        <select name="status_id" id="status_id" class="form-select form-select-sm @error('status_id') is-invalid @enderror">
                                            @foreach ($statuses as $status): ?>
                                                <option value="{{$status->value}}"> {{ucfirst($status->name)}} </option>
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div  class="row mt-2">
                                    <div class="col-6 col-md2 col-lg2 col-xl-2">
                                        <input type="submit" name="submit" id="submitSave" class="btn btn-primary btn-sm w-100" value="Save">
                                    </div>
                                    <div class="col-6 col-md2 col-lg2 col-xl-2">
                                        <input type="submit" name="submit" id="submitDelete" class="btn btn-primary btn-sm w-100" value="Delete" onclick="return confirmDelete()">
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-2 col-xl-2">
                                        <input type="button" class="btn btn-primary btn-sm w-100" value="Reset" onclick="window.location.href='{{ route('task') }}';">
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-md-12 col-lg-4">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>
</div>

<script>

    const form = document.getElementById('frmTask');
    form.addEventListener('submit', function (event) {
        //event.preventDefault();

        if (event.submitter.id == 'submitSave') {

            form.action = '{{ route('task.save') }}';
            form.method = 'POST';

        } else if (event.submitter.id == 'submitDelete') {

            form.action = '{{ route('task.delete') }}';
            form.method = 'POST';
        }

        form.submit();
    });

    function confirmDelete() {

        return confirm("Are you sure you want to delete this Task Id ? ");
    }
</script>

@endsection
