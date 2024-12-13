@extends('portal.layouts.master')




@section('content')


    <div class="banner-carousel banner-carousel-1 mb-0">
        @foreach ( $coverimages as $coverimage )
        <div class="banner-carousel-item" style="background-image:url({{ asset('uploads/coverimage/' .$coverimage->image) }})">
            <div class="slider-content">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12 text-center">
                            <h2 class="slide-title" data-animation-in="slideInLeft">Years of excellence in</h2>
                            <h3 class="slide-sub-title" data-animation-in="slideInRight">{{ $coverimage ->title }}</h3>
                            <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                <a href="{{ route('render_services') }}" class="slider btn btn-primary">Our Services</a>
                                {{-- <a href="{{ route('render_contact') }}" classs="slider btn btn-primary border">Contact Now</a> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <section class="call-to-action-box no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                            <h3 class="action-title">We understand your needs on construction</h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                            {{-- <a class="btn btn-dark" href="{{ route('render_contact') }}">Request Quote</a> --}}
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                Request Quote
                            </button>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    </section><!-- Action end -->


    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-intro">
                        {{-- <h2 class="into-title">About Us</h2> --}}
                        <h3 class="into-sub-title">
                            </p>
                    </div><!-- Intro box end -->


                    <div class="gap-20"></div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-trophy"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">We've Reputation for Excellence</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->


                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-sliders-h"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">We Build Partnerships</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-thumbs-up"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Guided by Commitment</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->


                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">A Team of Professionals</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->
                </div><!-- Col end -->


                <div class="col-lg-6 mt-4 mt-lg-0">
                    <h3 class="into-sub-title">Our Values</h3>
                    <p>Nita Engineering is committed to always delivering as promised and seeks partners who share this commitment and its values.</p>


                    <div class="accordion accordion-group" id="our-values-accordion">
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $mvcs[0]->title ?? ''}}
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#our-values-accordion">
                                <div class="card-body">
                                   {{ $mvcs[0]->description ?? ''}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">


                                        {{ $mvcs[1]->title ?? ''}}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#our-values-accordion">
                                <div class="card-body">


                                   {{ $mvcs[1]->description ?? ''}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        {{ $mvcs[2]->title ?? '' }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#our-values-accordion">
                                <div class="card-body">


                                    {{ $mvcs[2]->description ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Accordion end -->


                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Feature are end -->


    <section id="facts" class="facts-area dark-bg">
        <div class="container">
            <div class="facts-wrapper">
                <div class="row">
                    <div class="col-md-3 col-sm-6 ts-facts">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('css/images/icon-image/fact1.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ $projectCount }}">0</span></h2>
                            <h3 class="ts-facts-title">Total Projects</h3>
                        </div>
                    </div><!-- Col end -->


                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('css/images/icon-image/fact2.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ $teamCount }}">0</span></h2>
                            <h3 class="ts-facts-title">Staff Members</h3>
                        </div>
                    </div><!-- Col end -->


                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('css/images/icon-image/fact3.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="20000">0</span></h2>
                            <h3 class="ts-facts-title">Hours of Work</h3>
                        </div>
                    </div><!-- Col end -->


                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('css/images/icon-image/fact4.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="2">0</span></h2>
                            <h3 class="ts-facts-title">Countries Experience</h3>
                        </div>
                    </div><!-- Col end -->


                </div> <!-- Facts end -->
            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Facts end -->


    <section id="ts-service-area" class="ts-service-area pb-0">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">We Are Specialists In</h2>
                    <h3 class="section-sub-title">What We Do</h3>
                </div>
            </div>
            <!--/ Title row end -->


            <div class="row">
                <div class="col-lg-4">

                    @foreach ($serviceone as $service )
                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ asset('uploads/service/' . $service->icon) }}" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title">
                                <a href="{{ route('render_single_services', $service->slug) }}">{{ $service->title }}</a>
                            </h3>
                            <p>{!! Str::substr($service->description, 0, 170) !!}...</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid serv_ind_image" src="css/images/services/service-center.jpg"
                        alt="service-avater-image">
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                    @foreach ($servicetwo as $service)

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ asset('uploads/service/' . $service->icon) }}" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="{{ route('render_single_services', $service->slug) }}">{{ $service->title }}</a></h3>
                            <p>{!! Str::substr($service->description, 0, 197) !!}...</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!--/ Container end -->
    </section><!-- Service end -->

    <section class="content">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Satisfied Clients</h2>
                    <h3 class="section-sub-title">Our Experiences</h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <h3 class="column-title">Testimonials</h3>

                    <div id="testimonial-slide" class="testimonial-slide">
                        @foreach ($testimonials as $testimonial )
                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    {!! $testimonial->description !!}
                                </span>
                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb" src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">{{ $testimonial->name }}</h3>
                                        <span class="quote-subtext">{{ $testimonial->position }}</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 1 end -->
                        @endforeach
                    </div>
                    <!--/ Testimonial carousel end-->
                </div><!-- Col end -->

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <h3 class="column-title">Happy Clients</h3>
                    <div class="row all-clients">
                        @foreach ($clients as $client )
                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset('uploads/client/image/' . $client->image) }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 1 end -->
                        @endforeach


                    </div><!-- Clients row end -->


                </div><!-- Col end -->


            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Content end -->


    <section class="subscribe no-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="subscribe-call-to-acton">
                        <h3>Can We Help?</h3>
                        <h4>{{ $sitesetting->phone }}</h4>
                    </div>
                </div><!-- Col end -->
                <div class="col-lg-8">
                    <div class="ts-newsletter row align-items-center">
                        <div class="col-md-5 newsletter-introtext">
                            <h4 class="text-white mb-0">Reach Out to us!</h4>
                            <p class="text-white">Latest updates and news</p>
                        </div>

                        <div class="col-md-7 newsletter-form">
                            <form action="{{ route('admin.contact.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="newsletter-email" class="content-hidden">Your Email</label>
                                    <input type="email" name="email" id="newsletter-email"
                                        class="form-control form-control-lg" placeholder="Write your email and hit enter"
                                        autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

    <section id="news" class="news">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <h3 class="section-sub-title">Recent Projects</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{ route('render_single_project' , $project->slug) }}" class="latest-post-img">
                                <img loading="lazy" class="img-fluid" src="{{ asset('uploads/project/image/' . $project->image) }}" alt="img">
                            </a>
                        </div>


                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ route('render_single_project' , $project->slug) }}" class="d-inline-block">{{$project->title}}</a>
                            </h4>
                            <div class="latest-post-meta">
                                <span class="post-item-date">
                                    <i class="fa fa-clock-o"></i> {{ $project->created_at->format('Y-m-d') }}
                                </span>
                            </div>
                        </div>
                    </div><!-- Latest post end -->
                </div><!-- 1st post col end -->
                @endforeach


            <!--/ Content row end -->


            <div class="general-btn text-center mt-4">
                <a class="btn btn-primary" href="{{ route('render_projects') }}">See All Projects</a>
            </div>


        </div>
        <!--/ Container end -->
    </section>
    <!--/ News end -->


    {{-- Request a quote --}}
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
                        <div class="col-md-8">
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
                        <div class="col-md-8">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
              {{-- contact end --}}
            </div>

          </div>
        </div>
    </div>

    @if($latestVacancies->count())
    <div class="modal fade" id="vacancyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Latest Vacancies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($latestVacancies as $vacancy)
                        <div class="vacancy">
                            <h4>{{ $vacancy->vacancy_name }}</h4>
                            <p>Number of people required: {{ $vacancy->number_of_people_required }}</p>
                            <small>From: {{ $vacancy->from_date }} to {{ $vacancy->to_date }}</small>
                            <br>
                            <a href="{{ route('vacancy.single', ['id' => $vacancy->id]) }}" class="btn btn-success mt-2">Apply Now</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if($latestVacancies->count())
            $('#vacancyModal').modal('show');
        @endif
    });
</script>
@endsection
