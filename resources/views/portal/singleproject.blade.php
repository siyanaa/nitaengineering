@extends('portal.layouts.master')


@section('content')
    <div class="container py-5 main-service-container">
        <div class="row mb-12">
            <div class="col-lg-12">
                <h2 class="display-5 font-weight-light" style="color:#ffb600">{{ $project->title }}</h2>
            </div>
        </div>

        <div class="single-service-container">
            <div class="row ">

                <div class="col-md-offset-1 col-sm-8 col-md-8">


                    <div class="services-list">

                        <div class="row ">
                            <div class="col-sm-12 col-md-12 col-md-12 ">
                                <div class="service-block " style="visibility: visible;">
                                    <div class="">
                                        <img class="mt-3 service-img" src="{{ asset('uploads/project/image/' . $project->image) }}" style=""
                                            alt="">
                                        <a target="_blank" href="{{ asset('uploads/project/file/' . $project->file) }}"><span class="events_i" style="color: #ffb600"><i class="fa fa-download mr-2"  aria-hidden="true"></i>{{ $project->title }}</span> 
                                        </a>
                                        <div class="service-text text-justify mt-5">{!! $project->description !!} </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="other-posts col-sm-3 col-md-3 col-leg-3 ml-4 mt-4">
                <h5>Other Projects</h5>
                <ul class="list-arrow">
                    @foreach ($remainingproject as $project )
                    <li>
                        <a href="{{ route('render_single_project', $project->slug) }}">{{ $project->title }}</a>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
@endsection
