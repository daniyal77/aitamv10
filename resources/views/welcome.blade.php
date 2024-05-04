@extends('base::layouts.master')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div class="table-md-responsive">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example1_length"><label>تعداد <select
                                                name="example1_length" aria-controls="example1"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> ردیف</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example1_filter" class="dataTables_filter"><label>جستجو:<input
                                                type="search" autocomplete="off" class="form-control form-control-sm"
                                                placeholder="" aria-controls="example1"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table dataTable no-footer" id="example1" role="grid"
                                           aria-describedby="example1_info" style="width: 1612px;">
                                        <thead>
                                        <tr role="row">
                                            <th>متد</th>
                                            <th>آدرس</th>
                                            <th>نام</th>
                                            <th>کنترلر</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($routes as $route)
                                            <tr>
                                                <td>{{implode(',',$route->methods)}}</td>
                                                <td>{{ $route->uri()}}</td>
                                                <td>{{ $route->getName()}}</td>
                                                <td>{{ $route->getActionName()}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
