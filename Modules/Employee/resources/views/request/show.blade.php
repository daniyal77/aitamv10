@extends('base::layouts.master')
@section('title','مشخصات کارمند')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row pb-4 mb-4 border-bottom row-sm">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">{{trans('employee::employee.full_name')}}</span>
                                <span>{{$employee->personal_id}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">{{trans('employee::employee.id_code')}}</span>
                                <span>{{$employee->id_code}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">وضعیت تاهل</span>
                                <span>{{$employee->is_marriage()}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">وضعیت معافیت خدمت</span>
                                <span>{{$end_of_service}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block"> تعداد فرزندان </span>
                                <span>{{$employee->child_number}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4 mb-4 border-bottom row-sm">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">فیش حقوقی</span>
                                <span>{{$employee->pay_slip}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">مشاهده فیش حقوقی</span>
                                <span>{{$employee->is_pay_slip()}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">نوع قرارداد</span>
                                <span>{{$contract_type}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">شماره قرارداد</span>
                                <span>{{$employee->contract_number}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">تاریخ شروع قرارداد</span>
                                <span>{{$employee->start_contract_jalali}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">تاریخ اتمام قرارداد</span>
                                <span>{{$employee->end_contract_jalali}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">حق تخصص</span>
                                <span>{{$employee->expertise}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">حق سنوات</span>
                                <span>{{$employee->severance_pay}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">ضریب محاصبه اضافه کاری</span>
                                <span>{{$employee->overestimate}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block"> شماره بیمه</span>
                                <span>{{$employee->insurance_number}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block"> شماره پرسنلی دستگاه حضور و غیاب</span>
                                <span>{{$employee->personnel_number}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">حق السهم بیمه کارمند</span>
                                <span>{{$employee->employee_insurance}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block">حق السهم بیمه کارفرما</span>
                                <span>{{$employee->master_insurance}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="d-block"> مبلغ بیمه تکمیلی</span>
                                <span>{{$employee->supplementary_insurance}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-3 col-12">
                            <div class="form-group  ">
                                <span class="d-block"> نام بانک</span>
                                <span>{{$employee->bank_name}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <span class="d-block">شماره شبا</span>
                                <span>{{$employee->bank_shabah}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <span class="d-block">شماره کارت</span>
                                <span>{{$employee->bank_id_cart}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <span class="d-block"> شماره حساب</span>
                                <span>{{$employee->bank_hesab}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
