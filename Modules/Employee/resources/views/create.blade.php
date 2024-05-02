@extends('base::layouts.master')
@section('content')
    <form id="form_validation" class="form-validate-summernote" method="post"
          action="https://portal.bodypars.ir/employee/store" novalidate="novalidate">
        @csrf
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="name">نام<span class="text-danger">*</span></label>
                                    <input id="name" class="form-control" name="name" maxlength="255"
                                           required="required" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="last_name">نام خانوادگی
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="last_name" class="form-control" name="last_name"
                                           maxlength="255" required="required" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="id_code">کد ملی
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="id_code" required="required" name="id_code" maxlength="255"
                                           class="form-control" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="identity_serial_number">سریال شناسنامه
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="identity_serial_number" class="form-control"
                                           name="identity_serial_number" required="required" maxlength="255"
                                           value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="is_marriage">وضعیت تاهل
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="is_marriage" name="is_marriage"
                                            class="form-control is-valid" required="required"
                                            aria-invalid="false">
                                        <option value="" disabled="" selected="">لطفا انتخاب کنید</option>
                                        <option value="1">
                                            بلی
                                        </option>
                                        <option value="0" selected="">
                                            خیر
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="the_end_of_service">وضعیت معافیت خدمت

                                    </label>
                                    <select id="the_end_of_service" name="the_end_of_service"
                                            class="form-control is-valid" aria-invalid="false">
                                        <option value="0" selected="">لطفا انتخاب کنید</option>
                                        <option value="1">
                                            بلی
                                        </option>
                                        <option value="0">
                                            خیر
                                        </option>
                                        <option value="3">
                                            خانم
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="number_of_children"> تعداد فرزندان <span
                                            class="text-danger">*</span></label>
                                    <input id="number_of_children" class="form-control is-valid"
                                           name="number_of_children" maxlength="255" required="required"
                                           value="0" aria-invalid="false">

                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="job">فیش حقوقی<span class="text-danger">*</span></label>
                                    <select id="job" class="form-control" name="job" required="required">
                                        <option value="">لطفا انتخاب نمایید</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="shift_work_id">شیفت کاری <span class="text-danger">*</span></label>
                                    <select id="shift_work_id" required="required" class="form-control"
                                            name="shift_work_id">
                                        <option value="">لطفا انتخاب نمایید</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="is_pay_slip">مشاهده فیش حقوقی
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="is_pay_slip" name="is_pay_slip"
                                            class="form-control is-valid" required="required"
                                            aria-invalid="false">
                                        <option value="1">
                                            بلی
                                        </option>
                                        <option value="0" selected="">
                                            خیر
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="contract_type">نوع قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" required="required" name="contract_type"
                                            id="contract_type">
                                        <option value="">لطفا انتخاب نمایید</option>
                                        <option value="روز مزد">روز مزد</option>
                                        <option value="موقت">موقت</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="contract_number">شماره قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="contract_number" class="form-control" name="contract_number"
                                           maxlength="255" required="required" value="">


                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="start_contract">تاریخ شروع قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="start_contract" id="start_contract_real"
                                           readonly="readonly">
                                    <input id="start_contract"
                                           class="form-control pwt-datepicker-input-element" value=""
                                           required="required">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group  ">
                                    <label for="end_contract">تاریخ اتمام قرارداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="end_contract" id="end_contract_real"
                                           readonly="readonly">
                                    <input id="end_contract"
                                           class="form-control pwt-datepicker-input-element" value=""
                                           readonly="readonly" required="required">


                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="expertise">حق تخصص
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="expertise" class="form-control is-valid" name="expertise"
                                           onkeyup="separateNum(this.value,this);" maxlength="255"
                                           required="required" value="0" aria-invalid="false">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="severance_pay">حق سنوات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="severance_pay" class="form-control is-valid"
                                           name="severance_pay" onkeyup="separateNum(this.value,this);"
                                           maxlength="255" required="required" value="0"
                                           aria-invalid="false">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="overtime_rate">ضریب محاصبه اضافه کاری<span
                                            class="text-danger">*</span></label>
                                    <input id="overtime_rate" class="form-control is-valid"
                                           name="overtime_rate" maxlength="255" required="required"
                                           value="1" aria-invalid="false">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="insurance_number">
                                        شماره بیمه
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="insurance_number" class="form-control is-valid"
                                           name="insurance_number" maxlength="255" required="required"
                                           value="0" aria-invalid="false">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="personnel_id"> شماره پرسنلی دستگاه حضور و غیاب
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="personnel_id" class="form-control" name="personnel_id"
                                           required="required" maxlength="255" value="">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="employee_insurance">حق السهم بیمه کارمند
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="employee_insurance" class="form-control is-valid"
                                           name="employee_insurance" maxlength="255" required="required"
                                           onkeyup="separateNum(this.value,this);" value="0"
                                           aria-invalid="false">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="master_insurance">حق السهم بیمه کارفرما<span
                                            class="text-danger">*</span></label>
                                    <input id="master_insurance" class="form-control"
                                           name="master_insurance" maxlength="255" required="required"
                                           onkeyup="separateNum(this.value,this);" value="0"
                                           readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="supplementary_insurance">
                                        مبلغ بیمه تکمیلی<span class="text-danger">*</span>
                                    </label>
                                    <input id="supplementary_insurance" class="form-control is-valid"
                                           name="supplementary_insurance" required="required"
                                           onkeyup="separateNum(this.value,this);" value="0"
                                           aria-invalid="false">

                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-10 col-12">
                                <div class="form-group  ">
                                    <label for="address1">آدرس</label>
                                    <input id="address1" class="form-control" name="address1"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="form-group ">
                                    <label for="mobile1">تلفن
                                        <span class="text-danger">*</span></label>
                                    <input required="required" data-msg="الزامی میباشد" name="mobile1"
                                           maxlength="255" id="mobile1" class="form-control" value=""
                                           readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-10 col-12">
                                <div class="form-group  ">
                                    <label for="address2">آدرس</label>
                                    <input id="address2" class="form-control" name="address2"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="form-group  ">
                                    <label for="mobile2">تلفن</label>
                                    <input id="mobile2" class="form-control" name="mobile2" maxlength="255"
                                           value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-10 col-12">
                                <div class="form-group  ">
                                    <label for="address3">آدرس</label>
                                    <input id="address3" class="form-control" name="address3"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="form-group  ">
                                    <label for="mobile3">تلفن</label>
                                    <input id="mobile3" class="form-control" name="mobile3" maxlength="255"
                                           value="" readonly="readonly">

                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-3 col-12">
                                <div class="form-group  ">
                                    <label for="bank_name"> نام بانک</label>
                                    <input id="bank_name" class="form-control" name="bank_name"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group  ">
                                    <label for="bank_shabah"> شماره شبا</label>
                                    <input id="bank_shabah" class="form-control" name="bank_shabah"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group ">
                                    <label for="bank_id_cart">شماره کارت</label>
                                    <input id="bank_id_cart" class="form-control" name="bank_id_cart"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group  ">
                                    <label for="bank_hesab"> شماره حساب</label>
                                    <input id="bank_hesab" class="form-control" name="bank_hesab"
                                           maxlength="255" value="" readonly="readonly">

                                </div>
                            </div>
                            <button class="btn ripple d-none btn-primary" id="spinnerBtn" type="button">
                                            <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                                  role="status"></span>
                                <span class="sr-only">درحال ارسال...</span>
                            </button>
                            <button id="submitBtn" class="btn btn-primary">
                                ثبت
                                <span class="fontEn">(F10)</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
