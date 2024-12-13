@extends('portal.layouts.master')

@section('content')
    <div class='container py-5'>
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Testimonials</h2>
                <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>



        <div class="row text-center">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }} "
                            class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">{{ $testimonial->name }}</h5>
                    <h6 class="text-primary mb-3">{{ $testimonial->position }}</h6>
                    <p class="px-xl-3">
                        <i style="color:#ffb600" class="fas fa-quote-left pe-2"></i>{!! $testimonial->description !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
