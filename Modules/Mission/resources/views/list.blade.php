@php use App\Enums\Status; @endphp
@extends('base::layouts.master')
@section('breadcrumb_name','لیست ماموریت روزانه')
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
                                <th>نام و نام خانودگی</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($missions as $key=>$mission)
                                <tr>
                                    <td>{{$mission->id}}</td>
                                    <td>{{@$mission->employee->employeeRequest->full_name}}</td>
                                    <td>{{$mission->start_date_jalali}}</td>
                                    <td>{{$mission->end_date_jalali}}</td>
                                    <td>{{$mission->intro}}</td>
                                    <td>{{$mission->status()}}</td>
                                    <td>
                                        @if($mission->status != Status::PUBLISH)
                                            <a class="btn btn-sm ml-1 btn-success" title="تایید ماموریت"
                                               href="{{ route('mission.checked',$mission->id) }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
                                        @if($mission->status == Status::PENDING)
                                            <a class="btn btn-sm ml-1 btn-info" title="ویرایش ماموریت"
                                               href="{{ route('mission.edit',$mission->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif

                                        {{--                                            <a class="btn btn-sm ml-1 btn-danger" title="حذف مرخصی"--}}
                                        {{--                                               href="{{ route('mission.destroy',$vacation->id) }}">--}}
                                        {{--                                                <i class="fas fa-trash"></i>--}}
                                        {{--                                            </a>--}}
                                        @if($mission->status != Status::DRAFT)
                                            <a class="btn btn-sm ml-1 btn-danger" title="عدم تایید"
                                               href="{{ route('mission.unchecked',$mission->id) }}">
                                                <i class="fas fa-close"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            {{$missions->links()}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
