@extends('layouts.pos')
@section('title', 'Employees')
@section('block-header', 'Edit Employee')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    @include('layouts.messages')
                    <form action="{{route('employee.update', $employee->id)}}" method="post">
                        {{method_field('PUT')}}
                        <div class="row clearfix">
                            @csrf
                            <div class="col-sm-6">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Name" type="text" name="name" value="{{$employee->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Email" type="text" name="email" value="{{$employee->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="phone">Phone (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Phone No." type="text" name="phone" value="{{$employee->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="designation">Designation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Designation" type="text" name="designation" value="{{$employee->designation}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="nid">NID (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee NID No." type="text" name="nid" value="{{$employee->nid}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="present_address">Present Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee present Address" type="text" name="present_address" value="{{$employee->present_address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="present_address">Permanent Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee permanent Address" type="text" name="permanent_address" value="{{$employee->permanent_address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection