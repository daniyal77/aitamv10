@extends('base::layouts.master')
@section('title','ویرایش کارمند جدید')
@section('content')
    <form id="form_validation" class="form-validate-summernote" method="post"
          action="{{ route('employee.update', $employee->id) }}">
        @method('PUT')

        @csrf
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="personal_id">{{trans('employee::employee.full_name')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="personal_id" id="personal_id">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="id_code">{{trans('employee::employee.id_code')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="id_code" required="required" name="id_code" maxlength="255"
                                           value="{{$employee->id_code ?? ''}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="is_marriage">وضعیت تاهل
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="is_marriage" name="is_marriage" class="form-control"
                                            required="required">
                                        <option disabled="" selected="">لطفا انتخاب کنید</option>
                                        <option {{$employee->is_marriage ? 'selected' : ''}}  value="1">متاهل</option>
                                        <option {{!$employee->is_marriage ? 'selected' : ''}}  value="0">مجرد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="the_end_of_service">وضعیت معافیت خدمت</label>
                                    <select id="the_end_of_service" name="the_end_of_service"
                                            required="required" class="form-control">
                                        @foreach($dataReconcilement['endOfServices'] as $endOfService)
                                            <option
                                                {{$employee->the_end_of_service == $endOfService['id'] ? 'selected' : ''}} value="{{$endOfService['id']}}">{{$endOfService['value']}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="child_number"> تعداد فرزندان <span
                                            class="text-danger">*</span></label>
                                    <input id="child_number" class="form-control"
                                           value="{{$employee->child_number ?? ''}}" name="child_number" maxlength="255"
                                           required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="pay_slip">فیش حقوقی<span class="text-danger">*</span></label>
                                    <select id="pay_slip" class="form-control" name="pay_slip" required="required">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="is_pay_slip">مشاهده فیش حقوقی
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="is_pay_slip" name="is_pay_slip" class="form-control" required>
                                        <option {{$employee->is_pay_slip ? 'selected' : ''}}  value="1">بلی</option>
                                        <option {{!$employee->is_pay_slip ? 'selected' : ''}}  value="0" selected="">
                                            خیر
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="contract_type">نوع قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" required="required" name="contract_type"
                                            id="contract_type">
                                        @foreach($dataReconcilement['contactTypes'] as $contactTypes)
                                            <option
                                                {{$employee->contract_type == $contactTypes['id'] ? 'selected' : ''}}
                                                value="{{$contactTypes['id']}}">{{$contactTypes['value']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="contract_number">شماره قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="contract_number" class="form-control" name="contract_number"
                                           value="{{$employee->contract_number ?? ''}}" maxlength="255"
                                           required="required">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="start_contract">تاریخ شروع قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="start_contract" id="start_contract_real"
                                           value="{{strtotime($employee->start_contract)}}" readonly="readonly">
                                    <input id="start_contract" value="{{$employee->start_contract_jalali ?? ''}}"
                                           readonly="readonly" class="form-control pwt-datepicker-input-element"
                                           required="required">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="end_contract">تاریخ اتمام قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="end_contract" id="end_contract_real"
                                           value="{{strtotime($employee->end_contract_real)}}" readonly="readonly">
                                    <input id="end_contract" value="{{$employee->end_contract_jalali ?? ''}}"
                                           class="form-control pwt-datepicker-input-element"
                                           readonly="readonly" required="required">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="expertise">حق تخصص
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="expertise" class="form-control " name="expertise"
                                           onkeyup="separateNum(this.value,this);" maxlength="255"
                                           required="required" value="{{$employee->expertise ?? ''}}">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="severance_pay">حق سنوات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="severance_pay" class="form-control"
                                           name="severance_pay" onkeyup="separateNum(this.value,this);"
                                           maxlength="255" required="required"
                                           value="{{$employee->severance_pay ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="overestimate">ضریب محاصبه اضافه کاری<span
                                            class="text-danger">*</span></label>
                                    <input id="overestimate" class="form-control"
                                           value="{{$employee->overestimate ?? ''}}"
                                           name="overestimate" maxlength="255" required="required">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="insurance_number">
                                        شماره بیمه
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="insurance_number" class="form-control"
                                           name="insurance_number" maxlength="255" required="required"
                                           value="{{$employee->insurance_number ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="personnel_number"> شماره پرسنلی دستگاه حضور و غیاب
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="personnel_number" class="form-control" name="personnel_number"
                                           value="{{$employee->personnel_number ?? ''}}" required="required"
                                           maxlength="255">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="employee_insurance">حق السهم بیمه کارمند
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="employee_insurance" class="form-control"
                                           name="employee_insurance" maxlength="255" required="required"
                                           onkeyup="separateNum(this.value,this);"
                                           value="{{$employee->employee_insurance ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="master_insurance">
                                        حق السهم بیمه کارفرما
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="master_insurance" class="form-control"
                                           name="master_insurance" maxlength="255" required="required"
                                           onkeyup="separateNum(this.value,this);"
                                           value="{{$employee->master_insurance ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="supplementary_insurance">
                                        مبلغ بیمه تکمیلی
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="supplementary_insurance" class="form-control"
                                           name="supplementary_insurance" required="required"
                                           value="{{$employee->supplementary_insurance ?? ''}}"
                                           onkeyup="separateNum(this.value,this);">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label for="bank_name"> نام بانک</label>
                                    <input id="bank_name" class="form-control" name="bank_name"
                                           value="{{$employee->bank_name ?? ''}}" maxlength="255" required>

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label for="bank_shabah"> شماره شبا</label>
                                    <input id="bank_shabah" class="form-control" name="bank_shabah"
                                           value="{{$employee->bank_shabah ?? ''}}" maxlength="255" required>

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label for="bank_id_cart">شماره کارت</label>
                                    <input id="bank_id_cart" class="form-control" name="bank_id_cart"
                                           value="{{$employee->bank_id_cart ?? ''}}" required maxlength="255">

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label for="bank_hesab"> شماره حساب</label>
                                    <input id="bank_hesab" class="form-control" name="bank_hesab"
                                           value="{{$employee->bank_hesab ?? ''}}" required maxlength="255">
                                </div>
                            </div>
                            <button class="btn ripple d-none btn-primary" id="spinnerBtn" type="button">
                                <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                      role="status"></span>
                                <span class="sr-only">درحال ارسال...</span>
                            </button>
                            <button id="submitBtn" class="btn btn-primary">ویرایش</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('/assets/original/css/persian-datepicker/persian-datepicker.min.css') }}">
@endpush
@push('script')
    <script src="{{ asset('/assets/original/js/persian-datepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('/assets/original/js/persian-datepicker/persian-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#start_contract').persianDatepicker({
                format: 'YYYY/MM/DD',
                initialValueType: 'persian',
                altField: '#start_contract_real',
                initialValue: false,
                observer: true,
                altFormat: 'X',
                autoClose: true
            });
            $('#end_contract').persianDatepicker({
                format: 'YYYY/MM/DD',
                initialValueType: 'persian',
                altField: '#end_contract_real',
                initialValue: false,
                observer: true,
                altFormat: 'X',
                autoClose: true
            });
        });
    </script>

    <script src="{{asset('/assets/original/js/jquery.validate.min.js')}}"></script>
    <script>
        $(function () {
            let summernoteForm = $('.form-validate-summernote');
            summernoteForm.validate({
                errorElement: "div",
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                ignore: ':hidden:not(.summernote),.note-editable.card-block',
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.siblings("label"));
                    } else if (element.hasClass("summernote")) {
                        error.insertAfter(element.siblings(".note-editor"));
                    } else {
                        error.insertAfter(element);
                    }
                }, submitHandler: function (e) {
                    let input1 = $('#supplementary_insurance');
                    let input2 = $('#master_insurance');
                    let input3 = $('#employee_insurance');
                    let input4 = $('#expertise');
                    let input5 = $('#severance_pay');
                    input1.val(input1.val().replace(/,/g, ''));
                    input2.val(input2.val().replace(/,/g, ''));
                    input3.val(input3.val().replace(/,/g, ''));
                    input4.val(input4.val().replace(/,/g, ''));
                    input5.val(input5.val().replace(/,/g, ''));
                    $('#spinnerBtn').removeClass('d-none');
                    $('#submitBtn').addClass('d-none');
                    return true;
                }
            });
        });
    </script>
@endpush
