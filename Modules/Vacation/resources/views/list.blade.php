@extends('base::layouts.master')
@section('breadcrumb_name','')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div class="table-md-responsive">
                        <table class="table" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام ونام خانودگی</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vacations as $key=>$vacation)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$vacations->employee_id}}</td>
                                    <td>{{$vacations->start_date_jalali}}</td>
                                    <td>{{$vacations->end_date_jalali}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
