@extends('layouts.pos')
@section('title', 'Customers')
@section('block-header', 'Customers')
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
                    <a href="{{route('customer.create')}}" class="btn btn-success">Add New Customer</a>
                    <form action="{{route('customer.import')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="file" name="file">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>

                <div class="body">
                    @include('layouts.messages')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>TIN Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>TIN Number</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->tin_number}}</td>
                                <td>
                                    <a class="btn btn-primary waves-effect" href="{{route('customer.edit', $customer->id)}}">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <form style="display: inline;" action="{{route('customer.destroy', $customer->id)}}" method="post" id="delcustomer" onsubmit="return confirm('Are you sure you want to delete {{$customer->name}}');">
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