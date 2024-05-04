@extends('base::layouts.master')
@section('title','لیست کارمندان')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header mb-1">
                    @if((request()->route()->getName() == 'employee.index'))
                        <a class="btn btn-info" href="{{ route('employee.create') }}">جدید</a>
                        <a class="btn btn-danger" href="{{ route('employee.trash') }}">مشاهده کارمندان حذف شده</a>
                    @else
                        <a class="btn btn-green" href="{{ route('employee.index') }}">مشاهده کارمندان فعال</a>
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
                                @if((request()->route()->getName() == 'employee.index'))
                                    <th>عملیات</th>
                                @endif
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
                                    @if((request()->route()->getName() == 'employee.index'))
                                        <td>
                                            <a class="btn btn-sm ml-1 btn-primary" title="مشاهده"
                                               href="{{ route('employee.show',$employee->id) }}">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a title="ویرایش" class="btn ml-1 btn-sm btn-info"
                                               href="{{ route('employee.edit',$employee->id) }}"><i
                                                    class="fas fa-edit"></i>
                                            </a>
                                            <span class="btn btn-sm ml-1 btn-danger" title="حذف"
                                                  onclick="deleteRecord({{$employee->id}})">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        </td>
                                    @endif
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
@push('script')
    <script>
        function deleteRecord(id) {
            let deleteUrl = '{{url("/employee")}}/' + id
            swal({
                title: "آیا مطمئن هستید ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'تایید',
                closeOnConfirm: false,
                confirmButtonColor: "#ff2a01",
                showLoaderOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: deleteUrl,
                        method: 'DELETE',
                        data: {"_token": "{{csrf_token()}}"},
                        success: function (data) {
                            swal({
                                title: "پاک شد",
                                text: "کارمند با موفقیت حذف شد",
                                type: "success",
                                confirmButtonText: 'تایید',
                            })
                            location.reload()

                        }
                    })
                }
            });
        }
    </script>
@endpush
