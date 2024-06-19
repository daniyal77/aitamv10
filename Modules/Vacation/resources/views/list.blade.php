@extends('base::layouts.master')
@section('breadcrumb_name','لیست مرخصی')
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
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vacations as $key=>$vacation)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$vacation->employee->employeeRequest->full_name}}</td>
                                    <td>{{$vacation->start_date_jalali}}</td>
                                    <td>{{$vacation->end_date_jalali}}</td>
                                    <td>{{$vacation->intro}}</td>
                                    <td>{{$vacation->status()}}</td>
                                    <td>
                                        @if($vacation->status != 'publish')
                                            <a class="btn btn-sm ml-1 btn-success" title="تایید مرخصی"
                                               href="{{ route('vacation.checked',$vacation->id) }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a class="btn btn-sm ml-1 btn-info" title="ویرایش مرخصی"
                                               href="{{ route('vacation.edit',$vacation->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm ml-1 btn-danger" title="حذف مرخصی"
                                               href="{{ route('vacation.destroy',$vacation->id) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-sm ml-1 btn-danger" title="عدم تایید"
                                               href="{{ route('vacation.unchecked',$vacation->id) }}">
                                                <i class="fas fa-close"></i>
                                            </a>
                                        @endif
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
@stop
