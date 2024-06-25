@if (Session::has('suc'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('suc') !!}</li>
        </ul>
    </div>
@endif
@if (Session::has('err'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! Session::get('err') !!}</li>
        </ul>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif