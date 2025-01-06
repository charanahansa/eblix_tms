@extends('layouts.tms')

@section('title')
    Create Task
@endsection
@section('body')

<div class="container-fluid mt-3">
    <form method="post"  action="{{route('cpt_process')}}">

        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        Create Task
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                {!! $processMessage !!}
                            </div>
                        </div>

                        <div class="row no-gutters">

                            <div class="col-12 col-md-12 col-lg-8 col-xl-8">

                                <div class="row mb-2">
                                    <label for="client_id" class="col-6 col-md-2 col-lg-2 form-label-sm">Client </label>
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <select name="client_id" id="client_id" class="form-control form-select form-control-sm @error('client_id') is-invalid @enderror">
                                            @foreach($client as $row)
                                                @if($attributes->client_id == $row->client_id)
                                                    <option value={{$row->client_id}} selected>{{$row->client_name}} </option>
                                                @else
                                                    <option value={{$row->client_id}}> {{$row->client_name}} </option>
                                                @endif
                                            @endforeach
                                            @if($attributes->client_id == 0)
                                                <option value ="0" selected>Select the Client</option>
                                            @endif
                                        </select>
                                        @error('client_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="product_id" class="col-6 col-md-2 col-lg-2 form-label-sm">Product</label>
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <select name="product_id" id="product_id" class="form-control form-select form-control-sm @error('product_id') is-invalid @enderror">
                                            @foreach($product as $row)
                                                @if($attributes->product_id == $row->product_id)
                                                    <option value={{$row->product_id}} selected>{{$row->product_name}} </option>
                                                @else
                                                    <option value={{$row->product_id}}> {{$row->product_name}} </option>
                                                @endif
                                            @endforeach
                                            @if($attributes->product_id == 0)
                                                <option value ="0" selected>Select the Product</option>
                                            @endif
                                        </select>
                                        @error('product_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="department_id" class="col-6 col-md-2 col-lg-2 form-label-sm">Department</label>
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <select name="department_id" id="department_id" class="form-control form-select form-control-sm @error('department_id') is-invalid @enderror">
                                            @foreach($department as $row)
                                                @if($attributes->department_id == $row->dept_id)
                                                    <option value={{$row->dept_id}} selected>{{$row->dept_name}} </option>
                                                @else
                                                    <option value={{$row->dept_id}}> {{$row->dept_name}} </option>
                                                @endif
                                            @endforeach
                                            @if($attributes->department_id == 0)
                                                <option value ="0" selected>Select the Department</option>
                                            @endif
                                        </select>
                                        @error('department_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="user_id" class="col-6 col-md-2 col-lg-2 form-label-sm">User</label>
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <select name="user_id" id="user_id" class="form-control form-select form-control-sm @error('user_id') is-invalid @enderror">
                                            <option value ="0" selected>Select the User</option>
                                            @foreach($user as $row)
                                                @if($attributes->user_id == $row->id)
                                                    <option value={{$row->id}} selected>{{$row->first_name . '  ' . $row->last_name}} </option>
                                                @else
                                                    <option value={{$row->id}}> {{$row->first_name . '  ' . $row->last_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="action" class="col-6 col-md-2 col-lg-2 form-label-sm">Action</label>
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <select name="action" id="action" class="form-control form-select form-control-sm">
                                            <option value ="1" selected>Add</option>
                                            <option value ="0">Remove</option>
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-10">
                                        <hr>
                                    </div>
                                </div>

                                <div  class="row mt-2">
                                    <div class="col-6 col-md-3 col-lg-3 col-xl-2">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm w-100" value="Save">
                                    </div>
                                    <div class="col-6 col-md-3 col-lg-3 col-xl-2">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm w-100" value="Reset">
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

@endsection
