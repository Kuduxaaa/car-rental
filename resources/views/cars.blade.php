@extends('layouts/main')

<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('includes/header')

    <div class="hero inner-page" style="background-image: url('{{ asset('images/hero-1.jpg') }}');">

        <div class="container">
            <div class="row align-items-end ">
                <div class="col-lg-5">

                    <div class="intro">
                        <h1><strong>Cars</strong></h1>
                        <div class="custom-breadcrumbs"><a href="{{ route('home') }}">Home</a> <span class="mx-2">/</span>Cars</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Car Listings</strong></h2>
                    <p class="mb-5">Here is all our cars for you</p>
                </div>
            </div>

            <div class="row">
                @foreach ($cars as $car)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img mr-4">
                            <img src="{{ $car->images[0] }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="listing-contents">
                            <h3>{{ $car->name }}</h3>
                            <div class="rent-price">
                                <strong>${{ $car->price }}</strong><span class="mx-1">/</span>day
                            </div>
                            {{-- <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number">8</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div>
                            </div> --}}
                            <div>
                                <p>{{ Illuminate\Support\Str::limit($car->description, 80, $end = '...') }}</p>
                                <p><a href="{{ route('cars.detail', $car->id) }}" class="btn btn-primary btn-sm">Rent Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <div class="row">
                <div class="col-5">
                    <div class="custom-pagination">
                        <a href="#">1</a>
                        <span>2</span>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Testimonials</strong></h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet
                                veniam. Ipsam, nam, voluptatum"</p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('images/person_1.jpg') }}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Mike Fisher</span>
                                <span>Owner, Ford</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet
                                veniam. Ipsam, nam, voluptatum"</p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('images/person_2.jpg') }}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Jean Stanley</span>
                                <span>Traveler</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet
                                veniam. Ipsam, nam, voluptatum"</p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('images/person_3.jpg') }}" alt="Image" class="img-fluid mr-3">
                            <div class="author-name">
                                <span class="d-block">Katie Rose</span>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-primary py-5 mb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-md-0">
                    <h2 class="mb-0 text-white">What are you waiting for?</h2>
                    <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati,
                        laboriosam.</p>
                </div>
                <div class="col-lg-5 text-md-right">
                    <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer')

</div>
