@extends('layouts.pos')
@section('title', 'User Profile')
@section('block-header', 'User Profile')
@section('content')
    <div class="row clearfix">
        <div class="col-md-6 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h2>
                        UPDATE USER PROFILE
                    </h2>
                </div>
                @include('layouts.messages')
                <div class="body">
                    <form action="{{route('updateuserprofile', \Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        <label for="name">Your Name</label>
                        @csrf
                        <div class="form-group">
                            <div class="form-line">
                                <input id="name" class="form-control" placeholder="Enter your Name" type="text" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <label for="business_name">Your Business Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="name" class="form-control" placeholder="Enter your Business Name" type="text" name="business_name" value="{{$user->business_name}}">
                            </div>
                        </div>
                        <label for="email">Your Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="email" class="form-control" placeholder="Enter your email address" type="text" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="userimg">
                            <img width="80px" height="80px" src="{{asset('images/'.$user->image)}}" class="thumbnail img-responsive" alt="{{$user->name}}">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection