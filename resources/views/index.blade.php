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

    <div class="hero" style="background-image: url('{{ asset('images/hero.png') }}');background-color: #0000002b;color: #fff;height: 80vh;background-size: cover;background-repeat: no-repeat;background-blend-mode: multiply;">

        <div class="container">
            <div class="row align-items-center justify-content-center" style="padding-top: 124px;">
                <div class="col-lg-10">

                    <div class="row mb-5">
                        <div class="col-lg-12 intro">
                            <h1><strong>Car Rental - Search, Find the best fit & Save</strong></h1>
                            <div class="mini_nav">

                                <a class="nav-link dropdown-toggle" style="" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Safe Driving
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </a>

                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Best Cars
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </a>

                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Customer support
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </a>

                            </div>
                        </div>
                    </div>


                    <form class="trip-form" style="margin-top: 104px" method="post" action="{{ route('cars.search') }}">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="wrapper">
                            <div class="mb-6 mb-md-0 w-100">
                                <label class="selectorlabel" for="pickup">Pick-up location <span class="required">*</span></label>
                                <select name="pickup" id="pickup" class="form-control">
                                    <option value="">Select pick-up location</option>
                                    @foreach ($locations as $loc)
                                        @if ($loc->type == 'pickup')
                                            <option value="{{ $loc->name }}">{{ $loc->name }}@if ($loc->price != 0) + ${{ $loc->price }}@else [Free] @endif</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-6 mt-3 mb-md-0 w-100">
                                <label class="selectorlabel" for="dropoff">Drop-off location <span class="required">*</span></label>
                                <select name="dropoff" id="dropoff" class="form-control">
                                    <option value="">Select drop-off location</option>
                                    @foreach ($locations as $loc)
                                        @if ($loc->type == 'dropoff')
                                            <option value="{{ $loc->name }}">{{ $loc->name }}@if ($loc->price != 0) + ${{ $loc->price }}@else [Free] @endif</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex">
                                <div class="mb-6 mt-3 mr-2 mb-md-0 w-100">
                                    <label class="selectorlabel" for="email">Pick-up date <span class="required">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" id="cf-3" placeholder="Pick up date" name="pickup-date" class="form-control datepicker px-3">
                                        <span class="icon icon-date_range"></span>
                                    </div>
                                </div>

                                <div class="mb-6 mt-3 ml-2 mb-md-0 w-100">
                                    <label class="selectorlabel" for="email">Drop-off date <span class="required">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" id="cf-3" placeholder="Drop off date" name="dropoff-date" class="form-control datepicker px-3">
                                        <span class="icon icon-date_range"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex filters">
                                <div class="dropdown">
                                    <div class="dropdown-button row cat-fil" onclick="toggleDropdown()">Categories <img src="images/Path.png" class="img-fluid" alt="Instagram logo"></div>
                                    <div class="dropdown-menu-filter" id="dropdown-menu" style="display: none;">
                                        <div class="checkbox-row" style="display: flex; flex-direction: row;">
                                            <div class="checkbox-container">
                                                <label><input type="checkbox" name="All">All</label><br>
                                                @foreach ($cats as $cat)
                                                    <label><input type="checkbox" name="category[]" value="{{ $cat->name }}">{{ $cat->name }}</label><br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown" style="margin-left: 20px">
                                    <div class="dropdown-button row cat-fil" onclick="toggleDropdownFilter()">Filter <img src="images/Path.png" class="img-fluid" alt="Instagram logo"></div>
                                    <div class="dropdown-menu-filter" id="dropdown-menu-filter" style="display: none;">
                                        <div class="checkbox-row" style="display: flex; flex-direction: row;">
                                            @foreach ($filters as $key => $value)
                                            <div class="checkbox-container">
                                                <label>{{ $key }}</label><br>
                                                @foreach ($value as $filter)
                                                    <label><input type="checkbox" name="filters[{{ $key }}]" value="{{ $filter->value }}">{{ $filter->value }}</label><br>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 mt-4 mb-md-0 w-100 submitbtn">
                                <input type="submit" value="Search Now" class="btn btn-primary btn-block py-3" style="background-color: #039db1;">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <div class="site-section" style="padding-bottom: 0 !important;">
        <div class="container">
            <div class="row">
                <h2 class="section-heading"><strong>Best Seller</strong><img class="vector" src="images/Vector.png" alt=""></h2>
                <div class="BookNow viewdeals"><a href="#">View all deals</a></div>
            </div>


            <div class="row cars">
                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">

                        </div>
                        <div class="listing-contents ">
                            <h3>Lexus GX 460 (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">
                        </div>
                        <div class="listing-contents ">
                            <h3>Range Rover (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">
                        </div>
                        <div class="listing-contents ">
                            <h3>Mercedes Benz Gle (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="site-section" style="padding: 0 !important;">
        <div class="container">
            <div class="WhyUs">
                <h1>Why should you book with us?</h1>
                <p>Welcome to our car rental company, where your satisfaction is our top priority. If you are looking for a trustworthy car rental company, then look no further than us. Choose us for your next car rental and experience the difference</p>
                
                <div class="row">
                    <p><img src="{{ asset('images/headphone.png') }}" alt="">24/7 Customer Service</p>
                    <p><img src="{{ asset('images/x.png') }}" alt="">No Hidden Fees</p>
                    <p><img src="{{ asset('images/like.png') }}" alt="">Information You Can Trust</p>
                    <p><img src="{{ asset('images/tag.png') }}" alt="">Best Price Guaranteed</p>
                </div>

                <a href="{{ route('cars.all') }}">
                    <button class="BookNow btn btn-primary">Book Now</button>
                </a>
            </div>

        </div>
    </div>


    <div class="site-section" style="padding-bottom: 0 !important;">
        <div class="container">
            <div class="row">
                <h2 class="section-heading"><strong>Economy</strong><img class="vector" src="images/Vector.png" alt=""></h2>
                <div class="BookNow viewdeals"><a href="#">View all deals</a></div>
            </div>


            <div class="row cars">
                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">

                        </div>
                        <div class="listing-contents ">
                            <h3>Lexus GX 460 (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">
                        </div>
                        <div class="listing-contents ">
                            <h3>Range Rover (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                        <div class="listing-img  mr-4">
                            <img src="images/car.png"
                                 alt="Image" class="img-fluid"
                                 onmouseover="this.src='images/carHover.png'"
                                 onmouseout="this.src='images/car.png'">
                        </div>
                        <div class="listing-contents ">
                            <h3>Mercedes Benz Gle (2020)
                                <img src="images/Frame.png" alt="">
                            </h3>

                            <div class="daysCount row">
                                <div style="border-radius: 5px 0px 0px 5px;" class="days"><p>2-5 <br> Days</p>   </div>
                                <div class="days"><p>6-10 <br> Days</p></div>
                                <div class="days"><p>11-15 <br> Days</p></div>
                                <div style="border-radius: 0px 5px 5px 0px;" class="days"><p>16+ <br> Days</p></div>
                            </div>
                            <div class="Prices row">
                                <div class="price">129 $</div>
                                <div class="price">124 $</div>
                                <div class="price">119 $</div>
                                <div class="price">114 $</div>
                            </div>


                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>



    @include('includes/footer')

</div>

