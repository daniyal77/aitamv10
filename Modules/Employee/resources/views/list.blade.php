@extends('base::layouts.master')
@section('title','لیست کارمندان')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header mb-1">
                    <a class="btn btn-info" href="{{ route('employee.create') }}">جدید</a>
                    @if((request()->route()->getName() == 'employee.index'))
                        <a class="btn btn-danger" href="{{ route('employee.trash') }}">حذف شده</a>
                    @else
                        <a class="btn btn-green" href="{{ route('employee.index') }}">فعال</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-md-responsive">
                        <table class="table" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>کد ملی</th>
                                <th>تاریخ شروع قرار داد</th>
                                <th>تاریخ پایان قرار داد</th>
                                <th>شماره پرسنلی</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->id_code}}</td>
                                    <td>{{$employee->start_contract_jalali}}</td>
                                    <td>{{$employee->end_contract_jalali}}</td>
                                    <td>{{$employee->personnel_number }}</td>
                                    <td>
                                        <a href="{{ route('employee.show',$employee->id) }}">
                                            <i title="مشاهده">0</i>
                                        </a>
                                        <a href="{{ route('employee.edit',$employee->id) }}">
                                            <i title="ویرایش">0</i>
                                        </a>
                                        <span class="cu-pointer" onclick="deleteRecord({{$employee->id}})">
                                            <i title="حذف">0</i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            {{$employees->links()}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
