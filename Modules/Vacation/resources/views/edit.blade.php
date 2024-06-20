@extends('base::layouts.master')
@section('breadcrumb_name','ویرایش مرخصی')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <form id="form_validation" class="form-validate-summernote" method="post"
                          action="{{ route('vacation.update',$vacation->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-lg-4 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="employee_id">نام پرسنل</label>
                                    <p>{{@$vacation->employee->employeeRequest->full_name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="start_date"> تاریخ شروع</label>
                                    <input type="hidden" value="{{strtotime($vacation->start_date)}}" name="start_date"
                                           id="start_date_real" readonly="readonly">
                                    <input required="required" data-msg="الزامی میباشد" id="start_date" readonly=""
                                           value="{{verta($vacation->start_date)->format('Y-m-d') ?? ''}}"
                                           class="form-control pwt-datepicker-input-element">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="end_date"> تاریخ پایان</label>
                                    <input type="hidden" value="{{strtotime($vacation->end_date)}}" name="end_date"
                                           id="end_date_real">
                                    <input required="required" id="end_date" readonly=""
                                           value="{{verta($vacation->end_date)->format('Y-m-d') ?? ''}}"
                                           class="form-control pwt-datepicker-input-element">

                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="form-group">
                                    <label for="intro">توضیحات</label>
                                    <textarea class="form-control" name="intro" id="intro"
                                              rows="5">{{$vacation->intro}}</textarea>
                                </div>
                                <button class="btn ripple d-none btn-primary" id="spinnerBtn" type="button">
                                    <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                          role="status"></span>
                                    <span class="sr-only">درحال ارسال...</span>
                                </button>
                                <button id="submitBtn" class="btn btn-primary">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('style')
    <link rel="stylesheet" href="{{ asset('/assets/original/css/persian-datepicker/persian-datepicker.min.css') }}">
@endpush
@push('script')
    <script src="{{ asset('/assets/original/js/persian-datepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('/assets/original/js/persian-datepicker/persian-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#start_date').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date_real',
                initialValueType: 'persian',
                initialValue: true,
                observer: true,
                altFormat: 'X',
                autoClose: true
            });
            $('#end_date').persianDatepicker({
                format: 'YYYY/MM/DD',
                initialValueType: 'persian',
                altField: '#end_date_real',
                initialValue: true,
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
                    $('#spinnerBtn').removeClass('d-none');
                    $('#submitBtn').addClass('d-none');
                    return true;
                }
            });
        });
    </script>
@endpush
