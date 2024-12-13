@php
$sitesetting = App\Models\SiteSetting::first();
@endphp

<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="/">
                            <img loading="lazy" src="{{ asset('uploads/sitesetting/' .$sitesetting->main_logo) }}" alt="main_logo">
                            <span style="font-weight:600; font-size:16px;">Nita Engineering Pvt Ltd</span>
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Call Us</p>
                                        <p class="info-box-subtitle">(+977) {{ $sitesetting->phone }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email Us</p>
                                        <p class="info-box-subtitle">{{ $sitesetting->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="last">
                                <div class="info-box last">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Global Certificate</p>
                                        <p class="info-box-subtitle">{{ $sitesetting->global_certification }}</p>
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="header-get-a-quote">
                                <a class="btn btn-primary" href="{{ route('render_contact') }}">Get A Quote</a>
                            </li> --}}
                            <div style="display: flex; flex-direction:row;">
                                {{-- <a href="/admin/about/edit/{{ $about->id }}"> --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Get A Quote
                                      </button>
                            </div>
                     

                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item dropdown active">
                                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                                {{-- <a href="#" class="nav-link ">Home <i class="fa fa-angle-down"></i></a> --}}
                                {{-- <ul class="dropdown-menu" role="menu">
                                    <li class="active"><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                </ul> --}}
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Company <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('render_about') }}">About Us</a></li>
                                        <li><a href="{{ route('render_team') }}">Our People</a></li>
                                        <li><a href="{{ route('render_testimonial') }}">Testimonials</a></li>
                                        <li><a href="{{ route('render_faq') }}">Faq</a></li>
                                        {{-- <li><a href="{{ route('render_pricing') }}">Pricing</a></li> --}}
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('render_projects') }}">Projects</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('render_services') }}">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('render_news') }}">News</a></li>

                                {{-- <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="projects.html">Projects All</a></li>
                                        <li><a href="projects-single.html">Projects Single</a></li>
                                    </ul>
                                </li> --}}

                                {{-- <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="services.html">Services All</a></li>
                                        <li><a href="service-single.html">Services Single</a></li>
                                    </ul>
                                </li> --}}

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('render_image')  }}">Images</a></li>
                                        <li><a href="{{ route('render_video') }}">Videos</a></li>
                                        {{-- <li class="dropdown-submenu">
                                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Parent Menu</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#!">Child Menu 1</a></li>
                                                <li><a href="#!">Child Menu 2</a></li>
                                                <li><a href="#!">Child Menu 3</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>

                                {{-- <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="news-left-sidebar.html">News Left Sidebar</a></li>
                                        <li><a href="news-right-sidebar.html">News Right Sidebar</a></li>
                                        <li><a href="news-single.html">News Single</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item"><a class="nav-link" href="{{ route('render_client') }}">Clients</a>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link"
                                        href="{{ route('render_legaldocument') }}">Legal Documents</a></li> --}}

                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('render_contact') }}">Contact</a></li>
                                <li class="nav-item"><a class="nav-link"
                                            href="{{ route('render_vacancy') }}">vacancy</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
            <form action="{{ url('search') }}" method="GET">
                <div class="nav-search">
                    <span id="search"><i class="fa fa-search"></i></span>
                </div><!-- Search end -->

                <div class="search-block" style="display: none;">
                    <label for="search-field" class="w-100 mb-0">
                        <input type="text" name="search" value="" class="form-control" id="search-field"
                            placeholder="Type what you want and enter">
                    </label>
                    <span class="search-close">&times;</span>
                </div><!-- Site search end -->
            </form>
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->


<!-- Modal for quote -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reach Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- contact --}}
          <div class="container contact-form">
            <form method="post" action="{{ route('admin.contact.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *"
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"
                                value="" />
                        </div>
                     
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group contactButton">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
          {{-- contact end --}}
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>



