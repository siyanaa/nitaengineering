@extends('portal.layouts.master')

@section('content')

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">Services</h2>
            <p class="font-italic text-muted">The services we provide</p>
        </div>
    </div>

    <!-- Carousel wrapper -->
    <div id="" class="text-center">
        <!-- Inner -->
        <div class="carousel-inner py-4">
            <!-- Single item -->   
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        @foreach ($services as  $service)
                        <div class="col-lg-6 py-4">
                            <a href="{{ route('render_single_services', $service->slug) }}">
                                <div class="card">
                                    <img src="{{asset('uploads/service/' . $service->image) }}" class="card-img-top" alt="Waterfall"/>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $service->title }}</h5>
                                        <p class="card-text">
                                            {!! Str::substr($service->description, 0, 120) !!} <a href="{{ route('render_single_services', $service->slug) }}" style="font-size:14px; color:#ffb600">See More..</a>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection