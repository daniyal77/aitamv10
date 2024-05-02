@extends('employee::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('employee.name') !!}</p>
@endsection
