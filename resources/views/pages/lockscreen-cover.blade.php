@extends('layouts.custom-master')

@section('styles')
 
        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/swiper/swiper-bundle.min.css')}}">
      
@endsection

@section('content')

@section('error-body')
<body class="bg-white">
@endsection

        <div class="row authentication mx-0">

            <div class="col-xxl-7 col-xl-7 col-lg-12">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                        <div class="p-5">
                            <div class="mb-3">
                                <a href="{{url('index')}}">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="" class="authentication-brand desktop-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="" class="authentication-brand desktop-dark">
                                </a>
                            </div>
                            <p class="h5 fw-semibold mb-2">Lock Screen</p>
                            <p class="mb-3 text-muted op-7 fw-normal">Hello Jhon !</p>
                            <div class="d-flex align-items-center mb-4">
                                <div class="lh-1">
                                    <span class="avatar avatar-md avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="">
                                    </span>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0 fw-semibold text-dark">jhonslicer21@gmail.com</p>
                                </div>
                            </div>
                            <div class="row gy-3">
                                <div class="col-xl-12 mb-3">
                                    <label for="lockscreen-password" class="form-label text-default">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="lockscreen-password" placeholder="password">
                                        <button class="btn btn-light" type="button" onclick="createpassword('lockscreen-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
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
                                    <a href="{{url('index')}}" class="btn btn-lg btn-primary">Unlock</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="fs-12 text-muted mt-4">Try unlock with different methods <a class="text-success" href="javascript:void(0);"><u>Finger print</u></a> / <a class="text-success" href="javascript:void(0);"><u>Face Id</u></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
                <div class="authentication-cover">
                    <div class="aunthentication-cover-content rounded">
                        <div class="swiper keyboard-control">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="{{asset('build/assets/images/authentication/2.png')}}" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Lockscreen</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="{{asset('build/assets/images/authentication/3.png')}}" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Lockscreen</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="{{asset('build/assets/images/authentication/2.png')}}" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Lockscreen</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection

@section('scripts')

        <!-- SWIPER JS -->
        <script src="{{asset('build/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

        <!-- INTERNAL AUTHENTICATION JS -->
        @vite('resources/assets/js/authentication.js')


        <!-- SHOW PASSWORD JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection