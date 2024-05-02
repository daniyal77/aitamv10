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
