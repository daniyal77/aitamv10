@extends('base::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('base.name') !!}</p>
@endsection
