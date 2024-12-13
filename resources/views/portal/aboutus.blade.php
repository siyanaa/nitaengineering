@extends('portal.layouts.master')


@section('content')

<div class="about-section paddingTB60 gray-bg">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">About Us</h2>
                <p class="font-italic text-muted">Know a few things about us..</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-7">
                <div class="about-title clearfix">
                    <p class="about-paddingB">
                        {!! $abouts->content !!} 
                    </p>
                    {{-- <div class="about-icons"> 
                        <ul >
                            <li><a href=""><i id="social-fb" class="fa fa-facebook fa-3x social"></i></a> </li>
                            <li><a href=""><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a> </li>

                            <li> <a href=""><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a> </li>
                        </ul>       
                    </div> --}}
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="about-img">
                    <img src="{{asset('uploads/about/' . $abouts->image)}}" alt="">
                </div>
            </div>	
        </div>
    </div>
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
</div>

    {{-- <h1>{{ $about->title }}</h1>
    <img src="{{ asset('uploads/about/'. $about->image)  }}" alt="">
    <p>{!! $about->content !!}</p> --}}
{{-- @endforeach --}}



@endsection









