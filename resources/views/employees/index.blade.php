@extends('layouts.pos')
@section('title', 'Employees')
@section('block-header', 'Employees')
@section('head')
    <link href="{{asset('/inpos/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection
@section('footer')
    <script src="{{asset('inpos/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('inpos/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('inpos/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('inpos/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{route('employee.create')}}" class="btn btn-success">Add New Employee</a>
                </div>

                <div class="body">
                    @include('layouts.messages')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->designation}}</td>
                                    <td>{{$employee->present_address}}</td>
                                    <td>
                                        <a class="btn btn-primary waves-effect" href="{{route('employee.edit', $employee->id)}}">
                                            <i class="material-icons">mode_edit</i>
                                        </a>
                                        <form style="display: inline;" action="{{route('employee.destroy', $employee->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete {{$employee->name}}');">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button class="btn btn-danger waves-effect" type="submit">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
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
@endsection