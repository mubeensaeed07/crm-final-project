@extends('layouts.master')

@section('styles')
 
      
@endsection

@section('content')

                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">Timeline Charts</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apex Charts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Timeline Charts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Basic TImeline Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="timeline-basic"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Multiple Colored TImeline Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="timeline-colors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Multi Series Timeline Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="timeline-multi"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Advanced Timeline Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="timeline-advanced"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Timeline-Grouped Rows</div>
                                </div>
                                <div class="card-body">
                                    <div id="timeline-grouped"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

                </div>
    
@endsection

@section('scripts')

        <!-- APEX CHARTS JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- APEX MOMENT CHARTS JS -->
        <script src="{{asset('build/assets/libs/moment/moment.js')}}"></script>

        <!-- INTERNAL APEX TIME CHARTS JS -->
        @vite('resources/assets/js/apexcharts-timeline.js')
        

@endsection