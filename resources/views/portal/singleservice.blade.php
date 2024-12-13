@extends('portal.layouts.master')


@section('content')
<div class="container py-5 main-service-container">
    <div class="row mb-12">
        <div class="col-lg-12">
            <h2 class="display-5 font-weight-light" style="color:#ffb600">{{ $service->title }}</h2>
        </div>
    </div>


    <div class="single-service-container">
        <div class="row">
            <div class="col-md-offset-1 col-sm-8 col-md-8">
                <div class="services-list">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="service-block" style="visibility: visible;">
                                <!-- Service Image -->
                                @if($service->image)
                                <div class="service-image mb-4">
                                    <img src="{{ asset('uploads/service/' . $service->image) }}"
                                         alt="{{ $service->title }}"
                                         class="img-fluid rounded"
                                         style="max-width: 50%; height: auto;">
                                </div>
                                @endif


                                <!-- Service Description -->
                                <div class="service-description mb-4">
                                    {!! $service->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Sidebar with other services -->
            <div class="col-sm-3 col-md-3 ml-4">
                <div class="other-posts">
                    <h5>Other Services</h5>
                    <ul class="list-arrow">
                        @foreach($remainingservices as $otherService)
                        <li>
                            <a href="{{ route('render_single_services', $otherService->slug) }}">
                                {{ $otherService->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

