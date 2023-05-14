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

    <div class="hero inner-page"
        style="background-image: url('{{ $car->images[0] }}');background-blend-mode: multiply;background-color: #0000009c;">

        <div class="container">
            <div class="row align-items-end ">
                <div class="col-lg-5">

                    <div class="intro">
                        <h1><strong>{{ $car->name }}</strong></h1>                        
                        <div class="custom-breadcrumbs">
                            <a href="{{ route('home') }}">Home</a>
                            <span class="mx-2">/</span>
                            <a href="{{ route('cars.all') }}">Cars</a>
                            <span class="mx-2">/</span>{{ $car->name }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        #owl-demo .item img {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content">

                    <div id="owl-demo" class="owl-carousel owl-theme">
                        @foreach ($car->images as $image)
                            <div class="item"><img src="{{ $image }}" alt="{{ $car->name }}"></div>
                        @endforeach
                    </div>

                    <h2 class="mt-4">{{ $car->name }}</h2>
                    <h4 class="mb-4">${{ number_format((int) $car->price) }}</h4>

                    @if ($car->description)
                        <p class="mb-4">{{ $car->description }}</p>
                    @endif

                    <h3 class="mt-4 mb-2">Specifications</h3>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($filters as $filter)
                                    <tr>
                                        <td>{{ $filter->name }}</td>
                                        <td>{{ $filter->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3 style="margin-top: 80px;">Calculated Price: $<span id="price">{{ $car->price }}</span> </h3>

                    <h3 style="margin-top: 80px;">Book now</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="post" action="{{ route('make.order') }}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">First name <span
                                            class="required">*</span></label>
                                    <input type="text" id="form6Example1" class="form-control" name="fname"
                                        placeholder="Enter your first name" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Last name <span
                                            class="required">*</span></label>
                                    <input type="text" id="form6Example2" placeholder="Enter your last name"
                                        name="lname" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label" for="form6Example2">Pickup date <span
                                        class="required">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="datetime-local" placeholder="Pick up date" name="pickup-date"
                                        class="form-control px-3">
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="form6Example2">Dropoff date <span
                                        class="required">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="datetime-local" placeholder="Drop off date" name="dropoff-date"
                                        class="form-control px-3">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Pick-up location <span
                                            class="required">*</span></label>

                                    <select name="pickup-loc" id="pickup-loc" class="form-control">
                                        <option value="">Enter pick-up location</option>
                                        @foreach ($locations as $loc)
                                            @if ($loc->type == 'pickup')
                                                <option value="{{ $loc->name }}">{{ $loc->name }}@if ($loc->price != 0) + ${{ $loc->price }}@else [Free] @endif</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Drop-off location <span
                                            class="required">*</span></label>

                                    <select name="dropoff-loc" id="dropoff-loc" class="form-control">
                                        <option value="">Enter drop-off location</option>
                                        @foreach ($locations as $loc)
                                            @if ($loc->type == 'dropoff')
                                                <option value="{{ $loc->name }}">{{ $loc->name }}@if ($loc->price != 0) + ${{ $loc->price }}@else [Free] @endif</option>
                                            @endif    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3">Birthday date <span
                                    class="required">*</span></label>
                            <input type="text" id="cf-3" name="birthdate"
                                placeholder="Your birthdate (click to select)" class="form-control datepicker px-3">
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example4">Email Address <span
                                    class="required">*</span></label>
                            <input type="email" id="form6Example4" placeholder="Enter your email address"
                                name="email" class="form-control" />
                        </div>

                        <input type="hidden" name="price" value="{{ $car->price }}">
                        <input type="hidden" name="car_id" value="{{ $car->id }}">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example5">Phone number <span
                                    class="required">*</span></label>
                            <input type="phone" id="form6Example5" name="phone" placeholder="Enter phone number"
                                class="form-control" />
                        </div>

                        <br>
                        <p>Where you want to connect back?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicate_with"
                                value="phone_number" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Phone number
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicate_with" value="mail"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Mail
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicate_with" value="whatsapp"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Whatsapp
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicate_with" value="viber"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Viber
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4 mt-4">Send request

                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script lang="text/javascript">
        let pickup_prices = {
            @foreach ($locations as $loc)
                @if ($loc->type == 'pickup')
                    "{{ $loc->name }}": {{ $loc->price }},
                @endif
            @endforeach
        };
    
        let dropoff_prices = {
            @foreach ($locations as $loc)
                @if ($loc->type == 'dropoff')
                    "{{ $loc->name }}": {{ $loc->price }},
                @endif
            @endforeach
        };
    
        let carPrice = {{ $car->price }};
        let pickupDropdown = document.getElementById('pickup-loc');
        let dropoffDropdown = document.getElementById('dropoff-loc');
        let price = document.getElementById('price');
    
        pickupDropdown.onchange = (e) => {
            let pickupLocation = e.target.value;
            let pickupLocationPrice = pickup_prices[pickupLocation] || 0;
            let dropoffLocation = dropoffDropdown.value;
            let dropoffLocationPrice = dropoff_prices[dropoffLocation] || 0;
            let newPrice = carPrice + pickupLocationPrice + dropoffLocationPrice;
            price.innerText = newPrice;
        };
    
        dropoffDropdown.onchange = (e) => {
            let dropoffLocation = e.target.value;
            let dropoffLocationPrice = dropoff_prices[dropoffLocation] || 0;
            let pickupLocation = pickupDropdown.value;
            let pickupLocationPrice = pickup_prices[pickupLocation] || 0;
            let newPrice = carPrice + pickupLocationPrice + dropoffLocationPrice;
            price.innerText = newPrice;
        };
    </script>
    

    @include('includes/footer')

</div>
