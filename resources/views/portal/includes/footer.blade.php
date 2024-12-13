
<footer id="footer" class="footer bg-overlay">
<div class="footer-main">
    <div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
            {{-- @foreach ($abouts as $about ) --}}
            <h3 class="widget-title">{{ $abouts->title}}</h3>
            <img loading="lazy" width="200px" class="footer-logo" src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo)}}" alt="main-logo">

            {{-- <p>{!! Str::substr($about->content, 0, 20) !!}</p> --}}
            {{-- <p>Honesty and open communication have empowered NITA ENGINEERING's workforce since day one, and it shows in our work. We provide professional client focused construction solutions. We go above and beyond on every project and deliver on our promises with integrity.</p> --}}
            {{-- @endforeach --}}

        <div class="footer-social">
            <ul>
            <li><a href="{{ $sitesetting->facebook_link }}" target="_blank" aria-label="Facebook"><i
                    class="fab fa-facebook-f"></i></a></li>
            {{-- <li><a href="{{ $sitesetting->twitter_link }}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </li> --}}
            <li><a href="{{ $sitesetting->instagram_link }}" target="_blank" aria-label="Instagram"><i
                    class="fab fa-instagram"></i></a></li>
            {{-- <li><a href="{{ $sitesetting->github_link }}" aria-label="Github"><i class="fab fa-github"></i></a></li> --}}
            </ul>
        </div><!-- Footer social end -->
        </div><!-- Col end -->

        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
        <h3 class="widget-title">Working Hours</h3>
        <div class="working-hours">
            We work 6 days a week, excluding major holidays. Contact us if you have an emergency, with our
            Hotline and Contact form.
            <br><br> Sunday - Friday: <span class="text-right">10:00 - 17:00 </span>
            {{-- <br> Saturday: <span class="text-right">12:00 - 15:00</span>
            <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span> --}}
        </div>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
        <h3 class="widget-title">Services</h3>
        <ul class="list-arrow">
            @foreach ($services as $service )
            <li><a href="{{ route('render_single_services', $service->slug) }}">{{ $service->title }}</a></li>
            @endforeach


            {{-- <li><a href="service-single.html">Pre-Construction</a></li>
            <li><a href="service-single.html">General Contracting</a></li>
            <li><a href="service-single.html">Construction Management</a></li>
            <li><a href="service-single.html">Design and Build</a></li>
            <li><a href="service-single.html">Self-Perform Construction</a></li> --}}
        </ul>
        </div><!-- Col end -->
    </div><!-- Row end -->
    </div><!-- Container end -->
</div><!-- Footer main end -->

<div class="copyright">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
        <div class="copyright-info">
            <span>Copyright &copy; <script>
                document.write(new Date().getFullYear())
            </script>, Designed &amp; Developed by <a href="https://aashatech.com">Aashatech</a></span>
        </div>
        </div>

        <div class="col-md-6">
        <div class="footer-menu text-center text-md-right">
            <ul class="list-unstyled">
            <li><a href="{{ route('render_about') }}">About</a></li>
            <li><a href="{{ route('render_services') }}">Our Services</a></li>
            <li><a href="{{ route('render_faq') }}">Faq</a></li>
            <li><a href="{{ route('render_testimonial') }}">Testimonials</a></li>
            <li><a href="{{ route('render_client') }}">Clients</a></li>
            </ul>
        </div>
        </div>
    </div><!-- Row end -->

    {{-- <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top" id="backtop">
        <i class="fa fa-angle-double-up"></i>
        </button>
    </div> --}}


    <script>
        var btn = $('#backtop');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


    </script>

    </div><!-- Container end -->
</div><!-- Copyright end -->
</footer><!-- Footer end -->


