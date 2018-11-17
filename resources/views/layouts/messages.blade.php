<div class="row clearfix">
    <div class="col-sm-6">
    @if ($errors->has('email') || $errors->has('password'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            Opps! Wrong Credentials..
        </div>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('success-message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Success! </strong>{{\Illuminate\Support\Facades\Session::get('success-message')}}
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Error! </strong>{{$error}}
            </div>
        @endforeach
    @endif
    @if (\Illuminate\Support\Facades\Session::has('error-message'))
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Error! </strong>{{\Illuminate\Support\Facades\Session::get('error-message')}}
        </div>
    @endif
    </div>
</div>