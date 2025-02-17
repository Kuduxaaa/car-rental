@extends('admin/layouts/auth')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10 mt-4" style="color: #986923;">Welcome to {{ env('APP_NAME') }}</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <p class="fw-bold fs-2" style="color: #986923;">Welcome back to {{ env('APP_NAME') }} admin panel
                    <br />Good lucky!</p>
                    <!--end::Description-->
                </div>
                <!--end::Content-->
                <!--begin::Illustration-->
                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url('/assets/media/illustrations/sketchy-1/13.png')"></div>
                <!--end::Illustration-->
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <form class="form w-100" novalidate="novalidate" action="" method="POST">
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In</h1>
                            
                            @if($errors->any())
                                {!! implode('', $errors->all('<div class="text-gray-400 fw-bold fs-4">:message</div>')) !!}
                            @else
                                <div class="text-gray-400 fw-bold fs-4">Welcome back, Please sign in to continue</div>
                            @endif

                        </div>
                        <div class="fv-row mb-4 mt-4">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" placeholder="Enter your email" />
                        </div>
                        <div class="fv-row mb-10">
                            @csrf
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" placeholder="Enter password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                <div class="d-flex flex-center fw-bold fs-6">
                    <a href="/" class="text-muted text-hover-primary px-2">Back to home page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection