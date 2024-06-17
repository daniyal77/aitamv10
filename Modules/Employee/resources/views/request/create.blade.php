@extends('base::layouts.master')
@section('title','تعریف کارمند جدید')
@section('content')
    <form enctype="multipart/form-data" action="{{ route('employee.request.store') }}" id="form_validation"
          class="form-validate-summernote" method="post">
        @csrf
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row pb-4 mb-4 border-bottom row-sm">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">نام
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="name" required="required" name="name" maxlength="255"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="last_name"> نام خانوادگی<span
                                            class="text-danger">*</span></label>
                                    <input id="last_name" class="form-control" name="last_name" maxlength="255"
                                           required="required">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="skils">
                                        مهارت
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select id="skils" name="skils[]" multiple class="form-control">
                                        <option value="ندارد">ندارد</option>
                                        @foreach($skills as $skils)
                                            <option value="{{$skils}}">{{$skils}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="form-group ">
                                    <label for="file_resume">
                                        فایل رزومه
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" id="file_resume" class="form-control-file"
                                           name="file_resume">
                                </div>
                            </div>
                        </div>
                        <button class="btn ripple d-none btn-primary" id="spinnerBtn" type="button">
                                <span aria-hidden="true" class="spinner-border spinner-border-sm"
                                      role="status"></span>
                            <span class="sr-only">درحال ارسال...</span>
                        </button>
                        <button id="submitBtn" class="btn btn-primary">ثبت</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')

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
