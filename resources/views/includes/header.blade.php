<header class="site-navbar site-navbar-target" role="banner">

    <div class="container" style="width: 100%">
        <div class="row align-items-center position-relative">

            <div class="col-3">
                <div class="site-logo">
                    <a href="/"><strong>GEOAUTORENT</strong></a>
                </div>
            </div>

            <div class="col-9 text-right">

                <span class="d-inline-block d-lg-none"><a href="#"
                        class=" site-menu-toggle js-menu-toggle py-5 "><span
                            class="icon-menu h3 text-white"></span></a></span>

                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li><a href="/" class="nav-link">Home</a></li>
                        <li><a href="/cars" class="nav-link">Cars</a></li>

                        <li>
                            <a href="/contact" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                Contact
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item-social" href="https://www.instagram.com/geo_autorotent/"
                                    target="_blank" rel="noopener">
                                    <i class="fa fa-instagram fa-2x"></i>

                                    <span class="d-none d-lg-inline-block">
                                        <img src="{{ asset('images/insta.png') }}" class="img-fluid" alt="Instagram logo">
                                    </span>
                                </a>
                                </a>
                                <a class="dropdown-item-social" href="https://www.facebook.com/geo_autorotent/"
                                    target="_blank" rel="noopener">
                                    <i class="fa fa-facebook fa-2x"></i>

                                    <span class="d-none d-lg-inline-block">
                                        <img src="{{ asset('images/_Facebook.png') }}" class="img-fluid" alt="Instagram logo">
                                    </span>
                                </a>

                                <a class="dropdown-item-social" href="https://www.facebook.com/geo_autorotent/"
                                    target="_blank" rel="noopener">
                                    <i class="fa fa-facebook fa-2x"></i>
                                    <span class="d-none d-lg-inline-block">
                                        <img src="{{ asset('images/_WhatsApp.png') }}" class="img-fluid" alt="Instagram logo">
                                    </span>
                                </a>

                                <br>
                                
								<span target="_blank" rel="noopener">+995 (579) 05 04 09</span>

                            </div>
						</li>
                        <li><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/eng.png') }}" class="img-fluid"
                                    alt="Instagram logo">

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </a>

                            <div class="dropdown-menu langdropdown" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item-social" href="https://www.facebook.com/geo_autorotent/"
                                    target="_blank" rel="noopener">
                                    <span class="d-none d-lg-inline-block language">
                                        <img src="{{ asset('images/rus.png') }}" class="img-fluid"> Rus
                                    </span>
                                </a>
                            </div>

                            <ul class="row semi-nav" style="display: none">
                                <a id="#" class="nav-link">Rental Terms</a>
                                <a id="#" class="nav-link">About</a>
                            </ul>

                    </ul>

                    <ul class="row semi-nav">
                        <a id="myBtn" class="nav-link">Rental Terms</a>
                        <a id="aboutBtn" class="nav-link">About</a>
                    </ul>

                </nav>

                <div id="TermsModal" class="term-modal">
                    <div class="terms-modal-content column">
                        <span class="close">&times;</span>
                        <br>
                        <h1>Ready to hit the road? Our <span>RENTAL TERMS</span> make it easy!</h1>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Full Car Insurance: All of our rental cars come with full insurance coverage, so you
                                    can drive with peace of mind knowing that you are fully protected.</li>
                                <li>No Deposit Fees: We don't require any deposit fees, because we don’t believe in
                                    charging our customers unnecessary fees, so you can book with confidence.</li>
                                <li>Flexible Pick-Up: We understand that convenience is important to our customers.
                                    That's why we offer the option to pick up your rental car at the location that is
                                    most convenient for you.</li>
                                <li>Baby Car Seat for Free: We care about the safety of your children, so we provide a
                                    free baby car seat upon request, to ensure your child's safety.</li>
                                <li>English/Russian Speaking Driver: If you need a driver, we have you covered. If you
                                    prefer, we can provide an English or Russian speaking driver for your convenience,
                                    so you can communicate with ease.</li>
                                <li>Airport Transfer in Tbilisi/Kutaisi/Batumi: We offer airport transfers to and from
                                    Tbilisi, Kutaisi, and Batumi airports. Let us take the stress out of getting to and
                                    from the airport.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Rental Requirements</h2>
                            <ul>
                                <li>Valid Driver's License: A valid driver's license is required for all drivers.</li>
                                <li>Minimum Age: The minimum age to rent a car is 21 years old.</li>
                                <li>Payment: Payment must be made in full at the time of pickup.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Rental Period</h2>
                            <ul>
                                <li>Daily Rate: Our rental rates are based on a 24-hour period.</li>
                                <li>Late Return: Late returns may incur additional fees.</li>

                            </ul>
                        </div>

                        <div>
                            <h2>Insurance</h2>
                            <ul>
                                <li>Full Coverage: Our rental cars come with full insurance coverage.</li>
                                <li>Exclusions: Insurance coverage does not include damage caused by driver negligence,
                                    off-road use, or driving under the influence.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Fuel Policy</h2>
                            <ul>
                                <li>Full Tank: The car will be provided with a full tank of gas.</li>
                                <li>Return Policy: The car must be returned with a full tank of gas or you will be
                                    charged for refueling.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Cancelation Policy</h2>
                            <ul>
                                <li>Free Cancellation: You can cancel your reservation for free up to 48 hours before
                                    pickup.</li>
                                <li>Late Cancellation: Late cancellations may incur a fee.</li>
                            </ul>
                        </div>



                    </div>

                </div>





                <div id="aboutModal" class="about-modal">

                    <!-- Modal content -->
                    <div class="about-modal-content column">
                        <span class="close">&times;</span>
                        <br>
                        <h1>About us</h1>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Full Car Insurance: All of our rental cars come with full insurance coverage, so you
                                    can drive with peace of mind knowing that you are fully protected.</li>
                                <li>No Deposit Fees: We don't require any deposit fees, because we don’t believe in
                                    charging our customers unnecessary fees, so you can book with confidence.</li>
                                <li>Flexible Pick-Up: We understand that convenience is important to our customers.
                                    That's why we offer the option to pick up your rental car at the location that is
                                    most convenient for you.</li>
                                <li>Baby Car Seat for Free: We care about the safety of your children, so we provide a
                                    free baby car seat upon request, to ensure your child's safety.</li>
                                <li>English/Russian Speaking Driver: If you need a driver, we have you covered. If you
                                    prefer, we can provide an English or Russian speaking driver for your convenience,
                                    so you can communicate with ease.</li>
                                <li>Airport Transfer in Tbilisi/Kutaisi/Batumi: We offer airport transfers to and from
                                    Tbilisi, Kutaisi, and Batumi airports. Let us take the stress out of getting to and
                                    from the airport.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Valid Driver's License: A valid driver's license is required for all drivers.</li>
                                <li>Minimum Age: The minimum age to rent a car is 21 years old.</li>
                                <li>Payment: Payment must be made in full at the time of pickup.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Daily Rate: Our rental rates are based on a 24-hour period.</li>
                                <li>Late Return: Late returns may incur additional fees.</li>

                            </ul>
                        </div>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Full Coverage: Our rental cars come with full insurance coverage.</li>
                                <li>Exclusions: Insurance coverage does not include damage caused by driver negligence,
                                    off-road use, or driving under the influence.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Full Tank: The car will be provided with a full tank of gas.</li>
                                <li>Return Policy: The car must be returned with a full tank of gas or you will be
                                    charged for refueling.</li>
                            </ul>
                        </div>

                        <div>
                            <h2>Reasons To Book With Us</h2>
                            <ul>
                                <li>Free Cancellation: You can cancel your reservation for free up to 48 hours before
                                    pickup.</li>
                                <li>Late Cancellation: Late cancellations may incur a fee.</li>
                            </ul>
                        </div>



                    </div>

                </div>




            </div>


        </div>
    </div>

</header>
