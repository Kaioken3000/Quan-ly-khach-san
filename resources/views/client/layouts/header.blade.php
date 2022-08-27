<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index">Sogo Hotel</a></div>
            <div class="col-6 col-lg-8">


                <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- END menu-toggle -->

                <div class="site-navbar js-site-navbar">
                    <nav role="navigation">
                        <div class="container">
                            <div class="row full-height align-items-center">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li class="{{ Request::is('client/index') ? 'active':'' }}"><a href="index">Home</a></li>
                                        <li class="{{ Request::is('client/rooms') ? 'active':'' }}"><a href="rooms">Rooms</a></li>
                                        <li class="{{ Request::is('client/about') ? 'active':'' }}"><a href="about">About</a></li>
                                        <li class="{{ Request::is('client/events') ? 'active':'' }}"><a href="events">Events</a></li>
                                        <li class="{{ Request::is('client/contact') ? 'active':'' }}"><a href="contact">Contact</a></li>
                                        <li class="{{ Request::is('client/reservation') ? 'active':'' }}"><a href="reservation">Reservation</a></li>
                                        <li class="{{ Request::is('client/check') ? 'active':'' }}"><a href="check">Check</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>