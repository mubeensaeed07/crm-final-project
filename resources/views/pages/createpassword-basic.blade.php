@extends('layouts.custom-master')

@section('styles')
 
      
@endsection

@section('content')

@section('error-body')
<body>
@endsection

        <div class="container-lg">
            <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="my-5 d-flex justify-content-center">
                        <a href="{{url('index')}}">
                            <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                            <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                        </a>
                    </div>
                    <div class="card custom-card">
                        <div class="card-body p-5">
                            <p class="h5 fw-semibold mb-2 text-center">Create Password</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Hello Jhon !</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="create-password" class="form-label text-default">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="create-password" placeholder="password">
                                        <button class="btn btn-light" type="button" onclick="createpassword('create-password',this)"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="create-confirmpassword" class="form-label text-default">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="create-confirmpassword" placeholder="password">
                                        <button class="btn btn-light" onclick="createpassword('create-confirmpassword',this)" type="button"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <a href="{{url('index')}}" class="btn btn-lg btn-primary">Save Password</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="fs-12 text-muted mt-3">Back to home ? <a href="{{url('index')}}" class="text-primary">Click Here</a></p>
                            </div>
                            <div class="text-center my-3 authentication-barrier">
                                <span>OR</span>
                            </div>
                            <div class="btn-list text-center">
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                                </button>
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-google-line fw-bold text-dark op-7"></i>
                                </button>
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@section('scripts')

        <!-- SHOW PASSWORD JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection