@extends('base::layouts.master')
@section('breadcrumb_name','تقویم')
@section('content')
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class=" custom-card transcation-crypto">
                <div class=" bg-white p-3">
                    <div class="mb-2 card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
