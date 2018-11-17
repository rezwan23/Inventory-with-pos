@extends('layouts.pos')
@section('title', 'Item Categories')
@section('block-header', 'Edit Item Category')
@section('head')
    <link href="{{asset('inpos/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('footer')
    <script src="{{asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script>
        var inputBox = document.getElementById('catName');

        inputBox.onkeyup = function(){
            document.getElementById('catSlug').value = inputBox.value.replace(/\s+/g, '-').toLowerCase();
        }
    </script>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    @include('layouts.messages')
                    <form action="{{route('category.update', $category->id)}}" method="post">
                        {{method_field('PUT')}}
                        <div class="row clearfix">
                            @csrf
                            <div class="col-sm-6">
                                <label for="name">Name (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" id="catName" placeholder="Enter Item Category Name" type="text" name="name" value="{{$category->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="slug">Slug (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" id="catSlug" placeholder="Enter Item Category Slug" type="text" name="slug" value="{{$category->slug}}">
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