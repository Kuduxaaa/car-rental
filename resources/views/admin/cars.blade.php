
@extends('admin/layouts/admin')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-20">
                <div class="mb-17">
                    <div class="d-flex flex-stack mb-5">
                        <h3 class="text-black">Cars</h3>
                        <a href="javascript:void[0];" class="fs-6 fw-bold link-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                            <i class="bi bi-plus"></i>
                            Add new car
                        </a>
                    </div>
                    <div class="separator separator-dashed mb-9"></div>
                    <div class="row g-10">
                        
                        <div class="col-md-4">
                            <div class="card-xl-stretch me-md-6">
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="#">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('https://media.ed.edmunds-media.com/toyota/prius/2022/oem/2022_toyota_prius_4dr-hatchback_nightshade-edition-awd-e_fq_oem_1_1280.jpg')"></div>

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                                
                                <div class="mt-5">
                                    <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Toyota prius (2022)</a>
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div>

                                    <div class="fs-6 fw-bolder mt-5 d-flex justify-content-between flex-wrap">
                                        <span class="badge fs-2 fw-bolder text-gray-600 p-2 mt-2">
                                        <span class="fs-6 fw-bold text-gray-500">$</span>170</span>
                                        
                                        <div class="action-btns">
                                            <a href="#" class="btn btn-primary p-3 px-4">Edit</a>
                                            <a href="#" class="btn btn-danger p-3 px-4">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-xl-stretch me-md-6">
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="#">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('https://toyota-cms-media.s3.amazonaws.com/wp-content/uploads/2021/05/HERO-2022-Supra-A91-CF-Windtunnel-1500x844.jpg')"></div>

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                                
                                <div class="mt-5">
                                    <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Toyota GR Supra (2022)</a>
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">The GR Supra’s legendary performance and power is back for 2022</div>

                                    <div class="fs-6 fw-bolder mt-5 d-flex justify-content-between flex-wrap">
                                        <span class="badge fs-2 fw-bolder text-gray-600 p-2 mt-2">
                                        <span class="fs-6 fw-bold text-gray-500">$</span>210</span>
                                        
                                        <div class="action-btns">
                                            <a href="#" class="btn btn-primary p-3 px-4">Edit</a>
                                            <a href="#" class="btn btn-danger p-3 px-4">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-xl-stretch me-md-6">
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="#">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('https://hips.hearstapps.com/hmg-prod/images/dsc-9597alt-copy-1674571716.jpg?crop=0.614xw:0.462xh;0.208xw,0.411xh&resize=1200:*')"></div>

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                                
                                <div class="mt-5">
                                    <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">Infiniti Q50</a>
                                    <div class=" fs-5 text-gray-400 text-dark mt-3">The 2023 Infiniti Q50 reminds us that putting all the pieces in place required...</div>

                                    <div class="fs-6 fw-bolder mt-5 d-flex justify-content-between flex-wrap">
                                        <span class="badge fs-2 fw-bolder text-gray-600 p-2 mt-2">
                                        <span class="fs-6 fw-bold text-gray-500">$</span>200</span>
                                        
                                        <div class="action-btns">
                                            <a href="#" class="btn btn-primary p-3 px-4">Edit</a>
                                            <a href="#" class="btn btn-danger p-3 px-4">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection