@extends('layouts.pos')
@section('title', 'Supplier')
@section('block-header', 'Add Supplier')
@section('head')
    <link href="{{asset('inpos/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('footer')
    <script src="{{asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    @include('layouts.messages')
                    <form action="{{route('supplier.store')}}" method="post">
                        <div class="row clearfix">
                            @csrf
                            <div class="col-sm-6">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier Name" type="text" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="phone">Phone (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier Phone No." type="text" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier Email" type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="company">Company</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier Company" type="text" name="company">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="type">Company Type</label>
                                <select class="form-control show-tick" name="type">
                                    <option value="dealer">Dealer</option>
                                    <option value="company">Company</option>
                                    <option value="wholeseller">Wholeseller</option>
                                    <option value="distributor">Distributor</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier Address" type="text" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="tin_number">TIN Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Supplier TIN Number" type="text" name="tin_number">
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