@extends('base::layouts.master')
@section('title','لیست درخواست کارمند')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header pb-2">
                    <a class="btn btn-primary" href="{{ route('employee.request.create') }}">جدید</a>
                </div>
                <div class="card-body">
                    <div class="table-md-responsive">
                        <table class="table" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>مهارت ها</th>
                                <th>فایل رزومه</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employeeRequest as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{implode(',',$employee->skils)}}</td>
                                    <td>
                                        <a href="{{$employee->file_resume}}" download>دانلود</a>
                                    </td>
                                    <td>{{ \Modules\Employee\App\Enums\EmployeeRequestStatus::getLabel($employee->status)}}</td>

                                    {{--                                    <td>--}}
                                    {{--                                      --}}
                                    {{--                                        <a title="ویرایش" class="btn ml-1 btn-sm btn-info"--}}
                                    {{--                                           href="{{ route('employee.edit',$employee->id) }}">--}}
                                    {{--                                            <i class="fas fa-edit"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <span class="btn btn-sm ml-1 btn-danger" title="حذف"--}}
                                    {{--                                              onclick="deleteRecord({{$employee->id}})">--}}
                                    {{--                                            <i class="fas fa-trash"></i>--}}
                                    {{--                                        </span>--}}
                                    {{--                                    </td>--}}
                                </tr>
                            @endforeach
                            {{$employeeRequest->links()}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

